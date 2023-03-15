@extends('template')


@section('content')

    <div id="inscription" class="container">
        <div class="row">
            <div id="content" class="col-6 offset-3"> 

                <div class="row">
                    <div id="btn_connexion" class="col-6">
                        <h3 style="background-color: #3E6FED;"> <a href="/login"> CONNEXION </a> </h3>
                    </div>

                    <div id="btn_inscription" class="col-6">
                        <h3> <a href="/register"> INSCRIPTION </a>  </h3>
                    </div>
                </div>


                <div class="row">
                    <div class="col-12">
                        <form method="POST" action="/login" id="inscription_form" class="form">

                        @if (Session::has('status'))

                            <p style="color:green;"> {{Session::get('status')}} </p>

                        @endif

                            

                            <div class="form-group"> 
                                <label for="login"> Login </label>
                                <input required type="text" name="login" id="login" class="form-control" />
                            </div>

                            <div class="form-group"> 
                                <label for="password"> Mot de passe </label>
                                <input required type="password" name="password" id="password" class="form-control" />
                            </div>

                            <div class="confirmation_btn">
                                <button type="submit" class="btn btn-lg"> CONNEXION </button>
                            </div>


                            @if ($errors->has('login')) 
                                <p style="color:red;"> The provided credentials do not match our records. </p>
                            @endif

                            @csrf
                        
                        </form> 
                    </div>
                </div>



            </div>
        </div>
    </div>

@endsection