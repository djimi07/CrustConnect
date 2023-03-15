<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Providers\RouteServiceProvider; 
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash; 

class RegisterController extends Controller
{


    public function showForm(){
        return view('inscription');
    }

    public function store(Request $request){
        $request->validate([
           'nom' => 'required|string|max:255',
           'prenom' => 'required|string|max:255',
            'login' => 'required|string|max:255|unique:users',
            'password' => 'required|string|confirmed'//|min:8',
        ]);

        $user = new User();
        $user->login = $request->login;
        $user->mdp = Hash::make($request->password);
        $user->nom = $request -> nom ;
        $user->prenom = $request ->  prenom ;
        $user->save();
   
        session()->flash('etat','User added');
 
        Auth::login($user);

        return redirect()->intended('/');
    }
}