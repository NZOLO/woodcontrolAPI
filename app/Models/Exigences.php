<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exigences extends Model
{
    use HasFactory;

    protected $fillable = [
        'entrepriseID',
        'taxe',
        'montant',
        'montantpaye',
        'quittance',
        'montantnotpaid',
        'delai',
        'derogation',
        'refDocument',
        'statut',
    ];
}
