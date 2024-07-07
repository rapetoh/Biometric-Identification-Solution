<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionEnrolement extends Model
{
    use HasFactory;

    protected $fillable = [
        'est_validee', 'ref_enrolement', 'NIU', 'idAgent', 'idDDemo', 'idDBio'
    ];

    public function individu()
    {
        return $this->belongsTo(Individu::class, 'NIU', 'NIU');
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class, 'idAgent', 'idAgent');
    }

    public function donneesDemographiques()
    {
        return $this->hasOne(DonneesDemographiques::class, 'ref_enrolement', 'ref_enrolement');
    }

    public function donneesBiometriques()
    {
        return $this->hasOne(DonneesBiometriques::class, 'ref_enrolement', 'ref_enrolement');
    }
}
