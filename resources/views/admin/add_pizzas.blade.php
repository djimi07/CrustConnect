@extends('template')


@section('content')

    <div id="inscription" class="container">
        <div class="row">
            <div id="content" class="col-6 offset-3"> 

                <div class="row">
                    <div id="btn_inscription" class="col-6">
                        <h3 style="background-color: #3E6FED;"> <a href="/admin/add_pizzas"> Ajouter une pizza </a>  </h3>
                    </div>
                </div>

                @if (Session::has('success'))

                    <p style="color:green;"> {{ Session::get('success') }}  </p>

                @endif

                <div class="row">
                    <div class="col-12">
                        <form method="POST" action="/admin/add_pizzas" id="inscription_form" class="form">

                            <div class="form-group"> 
                                <label for="nom"> Nom </label>
                                <input required type="text" name="nom" id="nom" class="form-control" />
                            </div>

                            <div class="form-group">
                                <label for="prenom"> Description </label> 
                                <input required type="text" name="description" id="prenom" class="form-control" />
                            </div>

                            <div class="form-group"> 
                                <label for="login"> Prix </label>
                                <input required type="text" name="prix" id="login" class="form-control" />
                            </div>
                            
    
                            <div class="confirmation_btn">
                                <button type="submit" class="btn btn-lg"> Ajouter </button>
                            </div>

                            @csrf
                        
                        </form> 
                    </div>
                </div>





            </div>
        </div>
    </div>


@endsection

