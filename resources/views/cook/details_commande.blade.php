@extends('template')

@section('content')

<div class="container"> 

<div class="row">

<div class="col-12"> 

     <h2 style="text-align:center;margin-top:30px"> Détails de la commande </h2>

</div>

<div class="col-12">


   

    @if (Session::has('status'))

        <p style="color:green;"> Statut de commande mis a jour : <strong> {{ Session::get('status') }} </strong> </p>

    @endif



    <table class="table table-bordered" style="margin-top:30px">
        <thead>
            <tr>
                <th>Client</th>
                <th>Pizza</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Status</th>

            </tr>
        </thead>

        <tbody>

                <tr>
                        <td>{{ $commande->user->nom }} {{ $commande->user->prenom }}</td>
                        <td>{{  $commande->pizzas[0]->nom }}</td>
                        <th>{{ $commande->pizzas[0]->prix }}</th>
                        <td>{{ $commande->pizzas[0]->pivot->qte }}</td>
                        <td> <span class="btn statut infos"> {{ $commande->statut }} <span> </td>

                </tr>
     
        </tbody>

    </table>

 

        
        
</div>


<div class="col-12"> 
     <h2 style="text-align:center;margin-top:30px"> MAJ de l'état de commande </h2>
</div>

<div class="col-12 commande_center">
        <a href="/cook/liste_commandes/{{ $commande->id }}/pret" class="btn btn-success btn-lg"> Commande Prête </a>
        <a href="/cook/liste_commandes/{{ $commande->id }}/traitement" class="btn btn-success btn-lg"> Commande en traitement </a>
        <a href="/cook/liste_commandes/{{ $commande->id }}/recupere" class="btn btn-success btn-lg"> Commande récupérée </a>
</div>

</div>
</div>

@endsection

