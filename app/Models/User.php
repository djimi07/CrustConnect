<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'users';

    public $timestamps = false;

    
    protected $fillable = [
        'nom',
        'prenom',
        'login',
        'mdp',
        'type',
    ];

    public function getAuthPassword()
    {
        return $this->mdp;
    }



    public function commandes()
    {
        return $this->hasMany('App\Models\Commande');
    }



}
