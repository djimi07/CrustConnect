<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pizza;

use Session;

class CartController extends Controller
{
    public function add_to_cart(Request $request ,$id)
    {
        $pizza = Pizza::findOrFail($id);

        $total = 0;

        if (Session::has('total'))
        {
            $total = (int) Session::get('total');
        }

        if (Session::has('cart'))
        {
            $cart = $request->session()->get('cart');

            $found = 0;

            foreach ($cart as $pizza_cart)
            {
                if ($pizza_cart['id'] == $id)
                {
                    $found = 1;
                    break;
                }

                else
                {
                    $found = 0;
                }
            }

            if ($found)
            {

            }

            else
            {
                array_push($cart, ['id' => $id, 'qt' => 1, 'nom' => $pizza->nom, 'description' => $pizza->description, 'prix' => $pizza->prix, 'total' => $pizza->prix]);
                $request->session()->put('cart', $cart);
                
                $request->session()->put('total', $total+1);
            }
        }

        else
        {
            $request->session()->put('cart', [['id' => $id, 'qt' => 1, 'nom' => $pizza->nom, 'description' => $pizza->description, 'prix' => $pizza->prix, 'total' => $pizza->prix]]);

            $request->session()->put('total', $total+1);
        }

        $request->session()->flash('success', 'pizza added to cart');

        return redirect()->back();
    }

    public function cart(Request $request)
    {
        if (Session::has('cart'))
        {
            $cart = $request->session()->get('cart');

            $pizzas = [];

            $price_total = 0;

            foreach ($cart as $pizza)
            {
                $pizza['total'] = (int) ($pizza['qt'] * $pizza['prix']);
                array_push($pizzas, $pizza);
                $price_total = $price_total + $pizza['total'];
            }

            $request->session()->put('cart', $pizzas);
            $cart = $pizzas;

            return view('panier', ['pizzas' => $cart, 'prix_total' => $price_total]);
        }

        return view('panier')->withErrors([
            'empty' => 'empty cart',
        ]);
    }

    public function change_quantity(Request $request ,$id)
    {
        $pizza = Pizza::findOrFail($id);

        $cart = $request->session()->get('cart');

        $pizzas = [];
        $price_total = 0;

        $total = 0;

        foreach ($cart as $pizza)
        {
            if ($pizza['id'] == $id)
            {
                $pizza['qt'] = (int) $request->quantity;
                $pizza['total'] = (int) ($pizza['qt'] * $pizza['prix']);
                array_push($pizzas, $pizza);
                
            }

            else
            {
                array_push($pizzas, $pizza);
            }

            $price_total = $price_total + $pizza['total'];
            $total = (int) ($total + $pizza['qt']);

        }

        $request->session()->put('cart', $pizzas);
        $request->session()->put('total', $total);
        $cart = $pizzas;

        return redirect()->back();

    }


    public function delete_from_cart(Request $request, $id)
    {
        $pizza = Pizza::findOrFail($id);

        $cart = $request->session()->get('cart');

        $pizzas = [];
        $price_total = 0;

        $total = 0;

        foreach ($cart as $key => $pizza)
        {
            if ($pizza['id'] == $id)
            {
                unset($cart[$key]);
            }

            else
            {
                array_push($pizzas, $pizza);
            }

            $price_total = $price_total + $pizza['total'];

        }

        foreach ($pizzas as $pizza)
        {
            $total = ((int) $pizza['qt'] + $total);

        }

        $request->session()->put('cart', $pizzas);
        $request->session()->put('total', $total);
        $cart = $pizzas;

        return redirect()->back();

    }
    
    
}



