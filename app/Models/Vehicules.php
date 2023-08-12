<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicules extends Model
{
    use HasFactory;

    protected $fillable = [
        'matricule',
        'modele',
        'marque',
        'cartegrise',
        'validitecartegrise',
        'validiteassurance',
        'proprietairelegal',
        'typeVehicule',
        'entrepriseID',
    ];
}
