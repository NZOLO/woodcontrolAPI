<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreprises extends Model
{
    use HasFactory;

    protected $fillable = [
        'raison',
        'sigle',
        'codebarre',
        'typeStructures',
        'rccm',
        'nif',
        'capital',
        'origine',
        'bp',
        'adresseEntreprise',
        'telephoneEntreprise',
        'emailEntreprise',
        'datecreation',
        'nomgerant',
        'prenomgerant',
        'piecegerant',
        'numpiecegerant',
        'datevaliditepiecegerant',
        'telephonegerant',
        'adressegerant',
        'emailgerant',
        'type',
        'fiche',
        'scan',
        'immCNAMGS',
        'validiteCNAMGS',
        'justificatifCNAMGS',
        'immCNSS',
        'validiteCNSS',
        'justificatifCNSS',
        'pv',
        'datesignature',
        'nompresident',
        'prenompresident',
        'telpresident',
        'emailpresident',
        'nomsecretaire',
        'prenomsecretaire',
        'telsecretaire',
        'emailsecretaire',
        'nomtresorier',
        'prenomtresorier',
        'teltresorier',
        'emailtresorier',
    ];
}
