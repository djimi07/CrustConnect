<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Commande;
use App\Models\Pizza;

use Auth, Session;

class CookController extends Controller
{
    public function liste_commandes(Request $request)
    {
        $commandes = Commande::all()->sortByDesc('created_at');

        return view('cook.listes_commandes', ['commandes' => $commandes]);
    }

    public function details_commande(Request $request, $id)
    {
        $commande = Commande::findOrFail($id);

        return view('cook.details_commande', ['commande' => $commande]);

    }

    public function maj_etat(Request $request, $id, $etat)
    {
        $commande = Commande::findOrFail($id);

        $commande->statut = $etat;

        $commande->save();

        $request->session()->flash('status', $etat);

        return redirect()->back();
    }
}
