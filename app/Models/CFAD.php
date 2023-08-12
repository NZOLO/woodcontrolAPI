<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CFAD extends Model
{
    use HasFactory;

    protected $fillable = [
        'libelle',
        'type',
        'entrepriseID',
    ];
}
