<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Commande;
use App\Models\Pizza;

use Auth, Session;


class CommandeController extends Controller
{
    //CHECK (statut IN ('envoye','traitement','pret','recupere')), 

    public function confirm_cart(Request $request)
    {
        if (Session::has('cart') AND count(Session::get('cart')))
        {
            $user = Auth::user();
            $cart = Session::get('cart');


            foreach ($cart as $pizza)
            {
                $commande = $user->commandes()->create([
                    'statut' => 'envoye',
                ]);

                $commande->pizzas()->attach($pizza['id'], ['qte' => $pizza['qt']]);

            }

            $request->session()->put('cart', null);
            $request->session()->put('total', 0);

            $request->session()->flash('success', 'La commande est passé');

            return redirect()->route('mes_commandes');
        }

        else
        {
            abort(404);
        }
    }

    public function mes_commandes(Request $request)
    {
        $user = Auth::user();

        $commandes = $user->commandes()->get();

        $pizzas = [];

        foreach ($commandes as $commande) {

            $statut = $commande->statut;
            $qt = $commande->pizzas()->first()->pivot->qte;

            array_push($pizzas, [$commande->pizzas()->first(), 'qt' => $qt, 'statut' => $statut ]);
        }


        return view('mes_commandes', ['pizzas' => $pizzas]);
    }
}
