<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    use HasFactory;

    protected $table = 'region';
    protected $fillable=[
        'nom'
    ];

    public function centreEnrolement(){
        return $this->hasMany(CentreEnrolement::class);
    }

    public function agents(){
        return $this->hasMany(Agent::class);
    }
}
