<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionPreEnrolement extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom_individu', 'prenom_individu', 'telephone_individu', 'mail_individu', 'ref_enrolement', 'NIU', 'idDDemo'
    ];

    public function individu()
    {
        return $this->hasMany(Individu::class, 'NIU', 'NIU');
    }

    public function donneesDemographiques()
    {
        return $this->hasOne(DonneesDemographiques::class, 'idDDemo', 'idDDemo');
    }
}


