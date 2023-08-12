<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UFG extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle',
        'cfadID',
        'entrepriseID',
    ];
}
