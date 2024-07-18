<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Individu extends Model
{
    use HasFactory;

    protected $primaryKey = 'NIU';

    protected $fillable = [
        'NIU','nom', 'prenom', 'telephone'
    ];
}
