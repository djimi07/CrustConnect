@extends('template')

@section('content')

<div class="container"> 

<div class="row">

<div class="col-12"> 

     <h2 style="text-align:center;margin-top:30px"> Mes Commandes </h2>

</div>

<div class="col-12">


    @if (Session::has('success'))

        <p style="color:green;"> {{ Session::get('success') }} </p>

    @endif





    <table class="table table-bordered" style="margin-top:30px">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Total</th>
                <th>Status</th>

            </tr>
        </thead>

        <tbody>

            @foreach($pizzas as $pizza)

        
                <tr>
                        <td>{{ $pizza[0]['nom'] }}</td>
                        <td>{{ $pizza[0]['description'] }}</td>
                        <td>{{ $pizza[0]['prix'] }} €</td>
                        <td><input  type="number" readOnly name="quantity" value="{{ $pizza['qt'] }}" /></td>
                        <td>{{ $pizza[0]['prix'] * $pizza['qt'] }} €</td>
                        <td> <span class="btn statut infos"> {{ $pizza['statut'] }} <span> </td>
                </tr>



            @endforeach
     
        </tbody>

    </table>

    

        
        
</div>

</div>
</div>

@endsection

