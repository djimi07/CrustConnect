@extends('template')


@section('content')

    <div class="welcome_box">
        <h2> Bienvenue <span style="color:blue;"> {{ Auth::user()->nom }} {{ Auth::user()->prenom }} </span> </h2>

        @if (Session::has('etat'))

            <p style="color:green;"> {{Session::get('etat')}} </p>

        @endif
    </div>

    <div class="admin_panel">
        <a href="/change_password" class="admin-button btn btn-lg"> Changement de mot de passe </a>
        <a href="/pizzas_list" class="admin-button btn btn-lg"> Liste de pizza </a>
        <a href="/cart" class="admin-button btn btn-lg"> Mon panier </a>
        <a href="/mes_commandes" class="admin-button btn btn-lg"> Mes Commandes </a>
    </div>


@endsection

