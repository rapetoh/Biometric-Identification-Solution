<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Identifications extends Model
{
    
    use HasFactory; 
    
    protected $primaryKey = 'idIDENT';
    protected $fillable = [
        'nom', 'prenom', 'sexe', 'NIU', 'lieu_identification','domicile','telephone'
    ];


}
