<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonneesDemographiques extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom', 'nom_de_jeune_fille', 'prenom', 'sexe', 'statut_matrimonial', 'nom_prenom_conjoint', 'DOB', 'pays_ville_naissance', 'pays_ville_residence', 'quartier_residence', 'profession', 'secteur_emploi', 'mail', 'tel1', 'tel2', 'groupe_sanguin', 'pieces_justificatives', 'nom_personne_a_prevenir1', 'nom_personne_a_prevenir2', 'numero_personne_a_prevenir1', 'numero_personne_a_prevenir2', 'ref_enrolement', 'idAgent', 'NIU'
    ];

    public function individu()
    {
        return $this->belongsTo(Individu::class, 'ref_enrolement', 'ref_enrolement');
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class, 'idAgent', 'idAgent');
    }
}
