@extends('template')

@section('content')

<div class="container"> 

<div class="row">

<div class="col-12"> 

     <h2 style="text-align:center;margin-top:10px"> Liste des pizzas </h2>

</div>



<div class="col-12">

    <table class="table table-bordered">
        <thead>
            <tr>
                <th> ID </th>
                <th>Nom</th>
                <th>Description</th>
                <th>Prix</th>
            </tr>
        </thead>

        <tbody>

            @foreach($data as $pizza)
        
                <tr>
                    <td> {{ $pizza->id }} </td>
                    <td>{{ $pizza->nom }}</td>
                    <td>{{ $pizza->description }}</td>
                    <td>{{ $pizza->prix }} €</td>
                    <td> <a href="/admin/change_pizza/{{ $pizza->id }}"> Modifier </a> </td>
                    <td> <a href="/admin/delete_pizza/{{ $pizza->id }}"> Supprimer </a> </td>
                </tr>

            @endforeach
     
        </tbody>

    </table>

        
        
</div>

</div>
</div>

@endsection

