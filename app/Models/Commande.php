<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $table = 'commandes';

    protected $fillable = ['statut'];

    public $timestamps = true;


    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function pizzas()
    {
        return $this->belongsToMany('App\Models\Pizza')->withPivot('qte');
    }

}
