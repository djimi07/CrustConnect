@extends('template')


@section('content')



    


    <div id="inscription" class="container">
        <div class="row">
            <div id="content" class="col-6 offset-3"> 

                <div class="row">
                    <div id="btn_connexion" class="col-6">
                        <h3> <a href="/login"> CONNEXION </a> </h3>
                    </div>

                    <div id="btn_inscription" class="col-6">
                        <h3 style="background-color: #3E6FED;"> <a href="/register"> INSCRIPTION </a>  </h3>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <form method="POST" action="/register" id="inscription_form" class="form">

                            <div class="form-group"> 
                                <label for="nom"> Nom </label>
                                <input required type="text" name="nom" id="nom" class="form-control" />
                            </div>

                            <div class="form-group">
                                <label for="prenom"> Prenom </label> 
                                <input required type="text" name="prenom" id="prenom" class="form-control" />
                            </div>

                            <div class="form-group"> 
                                <label for="login"> Login </label>
                                <input required type="text" name="login" id="login" class="form-control" />
                            </div>

                            <div class="form-group"> 
                                <label for="password"> Mot de passe </label>
                                <input required type="password" name="password" id="password" class="form-control" />
                            </div>

                            <div class="form-group"> 
                                <label for="password_confirm"> Confirmez mot de passe  </label>
                                <input required type="password" name="password_confirmation" id="password_confirmation" class="form-control" />
                            </div>

                            @if ($errors->has('password')) 
                                <p style="color:red;"> {{$errors->first('password')}}  </p>
                            @endif


                            
                            @if ($errors->has('login')) 
                                <p style="color:red;"> {{$errors->first('login')}}  </p>
                            @endif
                            
    
                            <div class="confirmation_btn">
                                <button type="submit" class="btn btn-lg"> INSCRIPTION </button>
                            </div>

                            @csrf
                        
                        </form> 
                    </div>
                </div>





            </div>
        </div>
    </div>

@endsection

