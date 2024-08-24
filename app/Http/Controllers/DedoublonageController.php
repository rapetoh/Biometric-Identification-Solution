<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SessionEnrolement;
use App\Models\SessionPreEnrolement;
use App\Models\DonneesDemographiques;
use App\Models\DonneesBiometriques;
use App\Models\Individu;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class DedoublonageController extends Controller
{
    public function delete($id){
        try {

            $SE = SessionEnrolement::where('ref_enrolement', $id)->first();
            $source = 'pièces_justificatives/' . $SE->NIU;
            $source2 = 'validated/' . $SE->NIU;
            $source3 = 'toUpload/' . $SE->NIU;
            if (File::exists($source)) {
                Storage::deleteDirectory($source);
            }
            if (File::exists($source2)) {
                Storage::deleteDirectory($source2);
            }
            if (File::exists($source3)) {
                Storage::deleteDirectory($source3);
            }
            $ref_enr = $SE->getAttribute('ref_enrolement');
            $niu = $SE->getAttribute('NIU');
            Individu::where('NIU', $niu)->delete();
            SessionPreEnrolement::where('ref_enrolement', $ref_enr)->delete();
            DonneesDemographiques::where('ref_enrolement', $ref_enr)->delete();
            DonneesBiometriques::where('ref_enrolement', $ref_enr)->delete();
            $SE->delete();

            notify()->success('Doublon supprimé avec succès!', 'Succès');
            return redirect()->route('DedoublonageView')->with('success', 'Doublon supprimé avec succès.');

        } catch (\Exception $e) {

            notify()->error($e->getMessage(), 'Erreur');
            return redirect()->back()->with('error', 'Erreur lors de la suppression du doublon.');
        }
    }
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
