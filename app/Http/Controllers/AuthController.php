<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; 

class AuthController extends Controller
{
    
    public function showForm(){
        return view('connexion');
    }

    // login action
    public function login(Request $request){

        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string'
            ]);


        $credentials = [
            'login' => $request->input('login'),
            'password' => $request->input('password')
        ];


        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            $request->session()->flash('etat','Login successful');

            $type = Auth::user()->type;

            $request->session()->put('type', $type);

            if ($type == 'admin')
            {
                return redirect()->route('admin');

            }

            elseif ($type == 'cook')
            {
                return redirect()->route('cook');

            }

            return redirect()->route('home');

        }
        

        return back()->withErrors([
            'login' => 'The provided credentials do not match our records.',
        ]);
    }


    public function change_password(Request $request)
    {
        $validated = $request->validate([
            'password' => 'string|required',
            'new_password' => 'string|required|confirmed',
        ]);

        if (Hash::check($request->password, Auth::user()->mdp))
        {
            $user = Auth::user();

            $user->mdp = Hash::make($request->input('new_password'));
            $user->save();

            $request->session()->flash('success', 'le mot de passe est changé!');

            return redirect()->back();
        }

        return back()->withErrors([
            'pass_incorrect' => 'Your current password is incorrect',
        ]);
        
    }




    // logout action
    public function logout(Request $request){
        
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    
}
