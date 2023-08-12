<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneBordereau extends Model
{
    use HasFactory;
    protected $fillable = [
        'numero',
        'volume',
        'essenceID',
        'bordereauID',
        'aacID',
    ];
}
