<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Pizza;

class PizzasController extends Controller
{
    public function add_pizzas(Request $request)
    {
        $validated = $request->validate(
            [
                'nom' => 'required|string',
                'description' => 'required|string',
                'prix' => 'required|string',
            ]
        );

        $pizza = new Pizza();
        $pizza->nom = $request->input('nom');
        $pizza->description = $request->input('description');
        $pizza->prix = $request->input('prix');
        $pizza->save();

        $request->session()->flash('success', 'Pizza ajouté!');

        return redirect()->route('add_pizzas');

    }

    public function list_pizzas(Request $request)
    {
        $pizzas = Pizza::all();

        return view('admin.list_pizzas', ['data' => $pizzas]);
    }


    public function change_pizzas(Request $request, $id)
    {
        $pizza = Pizza::findOrFail($id);

        return view('admin.change_pizza', ['data' => $pizza]);
    }

    public function change_pizzas_post(Request $request, $id)
    {
        $validated = $request->validate([
            'nom' => 'required|string',
            'description' => 'required|string',
        ]);

        $pizza = Pizza::findOrFail($id);

        $pizza->nom = $request->input('nom');
        $pizza->description = $request->input('description');
        $pizza->save();

        $request->session()->flash('success', 'la pizza est mise a jour');

        return redirect()->back();

    }

    public function pizzas_pagination(request $request)
    {
        $pizzas = Pizza::paginate(2);

        return view('liste_pizzas', ['pizzas' => $pizzas]);
    }


    public function delete_pizza(request $request, $id)
    {
        $pizza = Pizza::findOrFail($id);

        $pizza->delete();

    }
}
