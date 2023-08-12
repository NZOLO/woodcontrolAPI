<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bordereau extends Model
{
    use HasFactory;
    protected $fillable = [
        'statut',
        'num_bord',
        'num_spec',
        'chauffeur',
        'dateBord',
        'volume_total',
        'volume_spec',
        'agentID',
        'societeProductionID',
        'societeDestinataireID',
        'societeTransportID',
        'vehiculeID',
        'cfadID',
        'ufgID',
    ];
}
