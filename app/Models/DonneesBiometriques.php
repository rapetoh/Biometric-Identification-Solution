<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonneesBiometriques extends Model
{
    use HasFactory;

    protected $fillable = [
        'empreinte_pouce', 'empreinte_index', 'empreinte_majeur', 'empreinte_annulaire', 'empreinte_auriculaire', 'photo', 'ref_enrolement', 'idAgent', 'NIU'
    ];

    public function individu()
    {
        return $this->belongsTo(Individu::class, 'NIU', 'NIU');
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class, 'idAgent', 'idAgent');
    }
}
