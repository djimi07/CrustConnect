@extends('template')


@section('content')

    <div id="inscription" class="container">
        <div class="row">
            <div id="content" class="col-6 offset-3"> 

                <div class="row">
                    <div id="btn_inscription" class="col-6">
                        <h3 style="background-color: #3E6FED;"> <a href="/change_password"> Changer le mot de passe </a>  </h3>
                    </div>
                </div>

                @if (Session::has('success'))
                    <p style="color:green;"> {{ Session::get('success') }}  </p>
                @endif


                <div class="row">
                    <div class="col-12">
                        <form method="POST" action="/change_password" id="inscription_form" class="form">

                            <div class="form-group"> 
                                <label for="nom"> Mot de passe actuel </label>
                                <input required type="text" name="password" id="nom" class="form-control" />
                            </div>

                            <div class="form-group">
                                <label for="prenom"> Nouveau mot de passe </label> 
                                <input required type="text" name="new_password" id="prenom" class="form-control" />
                            </div>

                            <div class="form-group"> 
                                <label for="login"> Confirmez le mot de passe </label>
                                <input required type="text" name="new_password_confirmation" id="login" class="form-control" />
                            </div>
                            
    
                            <div class="confirmation_btn">
                                <button type="submit" class="btn btn-lg"> Modifier </button>
                            </div>


                            @if ($errors->has('pass_incorrect'))
                                <p style="color:red;"> your current password is incorrect  </p>
                            @endif



                            @if ($errors->has('new_password'))
                                <p style="color:red;"> {{ $errors->first('new_password') }} </p>
                            @endif
                            

                            @csrf
                        
                        </form> 
                    </div>
                </div>

            </div>
        </div>
    </div>


@endsection

