<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CentreEnrolement extends Model
{
    use HasFactory;

    protected $primaryKey = 'idCentre';

    protected $table = 'centre_enrolement';
    
    protected $fillable = [
        'nom', 'adresse', 'telephone','idRegion',
    ];

    public function agents(){
        return $this->hasMany(Agent::class);
    }

    public function region(){
        return $this->belongsTo(Region::class);
    }

}
