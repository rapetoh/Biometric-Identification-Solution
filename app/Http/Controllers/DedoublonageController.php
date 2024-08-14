<?php

namespace App\Http\Controllers;

use App\Models\DonneesDemographiques;
use Illuminate\Http\Request;
use Vinkla\Hashids\Facades\Hashids;


class DedoublonageController extends Controller
{
    public function DedoublonageView(){

        $people = DonneesDemographiques::all();

        $clusters = $this->clusterPeople($people);

        return view('Dedoublonage', ['clusters' => $clusters]);
    }

    private function clusterPeople($people)
    {
        $threshold = 0.4; // Seuil de similitude pour considérer deux personnes comme similaires
        $clusters = [];
        foreach ($people as $person) {
            $found = false;
            foreach ($clusters as &$cluster) {
                if ($this->areSimilar($person, $cluster[0], $threshold)) {
                    $cluster[] = $person;
                    $found = true;
                    break;
                }
            }
            if (!$found) {
                $clusters[] = [$person];
            }
        }
        return $clusters;
    }

    private function areSimilar($person1, $person2, $threshold)
    {
        $similarAttributes = 0;
        $totalAttributes = 13; // Nombre total d'attributs comparés

        // Comparer chaque attribut
        if (strtolower($person1->nom) == strtolower($person2->nom)) {$similarAttributes++;$similarAttributes++;$similarAttributes++;$similarAttributes++;$similarAttributes++;};
        if (strtolower($person1->prenom) == strtolower($person2->prenom)) $similarAttributes++;
        if (strtolower($person1->sexe) == strtolower($person2->prenom)) $similarAttributes++;
        if (strtolower($person1->DOB) == strtolower($person2->prenom)) $similarAttributes++;
        if (strtolower($person1->statut_matrimonial) == strtolower($person2->prenom)) $similarAttributes++;
        if (strtolower($person1->pays_ville_naissance) == strtolower($person2->prenom)) $similarAttributes++;
        //if (strtolower($person1->pays_ville_residence) == strtolower($person2->prenom)) $similarAttributes++;
        if (strtolower($person1->quartier_residence) == strtolower($person2->prenom)) $similarAttributes++;
        if (strtolower($person1->profession) == strtolower($person2->prenom)) $similarAttributes++;
        if (strtolower($person1->secteur_emploi) == strtolower($person2->prenom)) $similarAttributes++;
        // Ajoute des comparaisons pour les autres attributs pertinents ici

        $similarityScore = $similarAttributes / $totalAttributes;
        return $similarityScore >= $threshold;
    }
}
