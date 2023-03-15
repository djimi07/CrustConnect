@extends('template')

@section('content')

<div class="container"> 

<div class="row">

<div class="col-12"> 

     <h2 style="text-align:center;margin-top:30px"> Liste des commandes </h2>

</div>

<div class="col-12">


    @if (Session::has('success'))

        <p style="color:green;"> {{ Session::get('success') }} </p>

    @endif





    <table class="table table-bordered" style="margin-top:30px">
        <thead>
            <tr>
                <th>Client</th>
                <th>Pizza</th>
                <th>Date</th>
                <th>Status</th>
                <th>Détails</th>

            </tr>
        </thead>

        <tbody>

            @foreach($commandes as $commande)

        
                <tr>
                        <td>{{ $commande->user->nom }} {{ $commande->user->prenom }}</td>
                        <td>{{  $commande->pizzas[0]->nom }}</td>
                        <th>{{ $commande->created_at }}</th>
                        <td> <span class="btn statut infos"> {{ $commande->statut }} <span> </td>
                        <td> <a href="/cook/liste_commandes/{{ $commande->id }}"> <span class="btn btn-info"> Voir détails <span> </a></td>

                </tr>



            @endforeach
     
        </tbody>

    </table>

  

        
        
</div>

</div>
</div>

@endsection

