<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;


class Pizza extends Model
{
    use HasFactory;

    use SoftDeletes;

    protected $table = 'pizzas';

    public $timestamps = true;

    protected $fillable = [
        'nom',
        'description',
        'prix',
    ];


    public function commandes()
    {
        return $this->belongsToMany('App\Models\Commande')->withPivot('qte');
    }


}
