@extends('template')

@section('content')

<div class="container"> 

<div class="row">

<div class="col-12"> 

     <h2 style="text-align:center;margin-top:30px"> Mon panier </h2>

</div>

<div class="col-12">

@if (Session::has('cart') AND count(Session::get('cart')) > 0)


    <table class="table table-bordered" style="margin-top:30px">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Total</th>

            </tr>
        </thead>

        <tbody>

            @foreach($pizzas as $pizza)

            <form method="POST" action='/change_quantity/{{ $pizza["id"] }}' >
        
                <tr>
                        <td>{{ $pizza['nom'] }}</td>
                        <td>{{ $pizza['description'] }}</td>
                        <td>{{ $pizza['prix'] }} €</td>
                        <td><input type="number" name="quantity" value="{{ $pizza['qt'] }}" /></td>
                        <td>{{ $pizza['total'] }} €</td>
                        <td> <button type="submit" class="btn add_to_cart"> Modifier </button> </td>
                        <td> <a href="/delete_from_cart/{{ $pizza['id'] }}" class="btn add_to_cart"> Supprimer </a> </td>
                </tr>

                @csrf

            </form>

            @endforeach
     
        </tbody>

    </table>

    <h4 style="text-align:center;"> Prix total de la commande: {{ $prix_total }} € </h4> 


    <div style="text-align:center;margin-top:20px;"> <h3 class="btn btn-lg confirm_command"> <a href="/confirm_cart" style="color:white;"> Passer la commande </a> </h3> </div>

@else

    <h4 style="color:red;text-align:center;"> Votre panier est vide! </h4>


@endif

        
        
</div>

</div>
</div>

@endsection

