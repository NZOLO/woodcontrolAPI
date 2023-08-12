<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CNAMGS extends Model
{
    use HasFactory;

    protected $fillable = [
        'immatriculation',
        'datecreation',
        'validite',
        'entrepriseID',
        'employe',
        'montant',
        'paye',
        'quittance',
        'restant',
        'delailegal',
        'delaimoratoire',
        'scanquittance',
        'scanmoratoire',
    ];
}
