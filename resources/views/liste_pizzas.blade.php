@extends('template')

@section('content')

<div class="container"> 

<div class="row">

<div class="col-12"> 

     <h2 style="text-align:center;margin-top:30px"> Liste des pizzas disponible </h2>

</div>

<div class="col-12">

    @if (Session::has('success'))

        <p style="color:green;"> Pizza added to cart </p>

    @endif


  
    <table class="table table-bordered" style="margin-top:30px">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Prix</th>

            </tr>
        </thead>

        <tbody>

            @foreach($pizzas as $pizza)
        
                <tr>
                        <td>{{ $pizza->nom }}</td>
                        <td>{{ $pizza->description }}</td>
                        <td>{{ $pizza->prix }} €</td>
                        <td> <a href="/add_to_cart/{{ $pizza->id }}" class="btn add_to_cart"> Ajouter au panier </a> </td>
                </tr>

            @endforeach
     
        </tbody>

    </table>


    <div class="d-flex" style="justify-content:center;">
        {!! $pizzas->links() !!}
    </div>

            

        
        
</div>

</div>
</div>

@endsection

