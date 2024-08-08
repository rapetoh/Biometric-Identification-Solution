<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\CentreEnrolement;
use App\Models\SessionEnrolement;
use Illuminate\Http\Request;
use App\Models\DonneesDemographiques;
use App\Models\SessionPreEnrolement;
use Illuminate\Support\Facades\DB;

class Statistiques extends Controller
{
    public function displayStat()
    {
        $regions = DonneesDemographiques::with('agent.region')
            ->whereHas('agent', function ($query) {
                $query->where('exist', 1);
            })
            ->get()
            ->pluck('agent.region.nom') // This should work
            ->unique()
            ->values()
            ->all();

        $adultesPerRegion = DonneesDemographiques::with('agent.region')
            ->whereHas('agent', function ($query) {
                $query->where('exist', 1); // adultes
            })
            ->whereRaw('TIMESTAMPDIFF(YEAR, DOB, CURDATE()) >= 18')
            ->get()
            ->countBy('agent.region.nom');


        $mineursPerRegion = DonneesDemographiques::with('agent.region')
            ->whereHas('agent', function ($query) {
                $query->where('exist', 1); // mineurs
            })
            ->whereRaw('TIMESTAMPDIFF(YEAR, DOB, CURDATE()) < 18')
            ->get()
            ->countBy('agent.region.nom');



        $nbre_enr = SessionEnrolement::where('est_validee', 1)->count();
        $nbre_agts = Agent::where('exist', 1)->count();
        $nbre_CE = CentreEnrolement::where('exist', 1)->count();
        $nbre_SPE = SessionPreEnrolement::where('nom_individu', '!=', null)->count();





        // REPARTITION SEXE
        $donneesDemographiques = DonneesDemographiques::all();

        $nombreTotal = $donneesDemographiques->count();

        $nombreHommes = $donneesDemographiques->where('sexe', 'M')->count();
        $nombreFemmes = $donneesDemographiques->where('sexe', 'F')->count();

        $pHommes = ($nombreHommes / $nombreTotal) * 100;
        $pFemmes = ($nombreFemmes / $nombreTotal) * 100;



        // REPARTITION STATUT MATRI
        $total = $donneesDemographiques->count();

        $st_matri = $donneesDemographiques->groupBy('statut_matrimonial')
            ->mapWithKeys(function ($group, $statut) use ($total) {
                return [$statut => number_format(($group->count() / $total) * 100, 2)];
            })
            ->all();


        // GROUPE SANGUIN
        $donneesDemographiques = DonneesDemographiques::all();
        $nombreTotal = $donneesDemographiques->count();
        $groupesSanguins = $donneesDemographiques->groupBy('groupe_sanguin');
        $pourcentagesGroupesSanguins = [];
        foreach ($groupesSanguins as $groupeSanguin => $group) {
            $nombre = $group->count();
            $pourcentage = ($nombre / $nombreTotal) * 100;
            $pourcentagesGroupesSanguins[$groupeSanguin] = number_format($pourcentage, 2);
        }



        //SECTEUR D'ACTIVITE
        $secteursActivite = $donneesDemographiques->groupBy('secteur_emploi');
        $PSA = [];
        foreach ($secteursActivite as $secteurActivite => $group) {
            $nombre2 = $group->count();
            $pourcentage = ($nombre2 / $nombreTotal) * 100;
            $PSA[$secteurActivite] = number_format($pourcentage, 2);
        }


        $allMonths = SessionEnrolement::selectRaw('MONTH(created_at) as mois')
            ->distinct()
            ->pluck('mois')
            ->all();

            $sessionsParMois = SessionEnrolement::selectRaw('MONTH(created_at) as mois, COUNT(*) as nombre')
            ->where('idAgent','!=',0)
            ->groupBy('mois')
            ->get()
            ->keyBy('mois');

            $sessionsPreEnrParMois = SessionEnrolement::selectRaw('MONTH(created_at) as mois, COUNT(*) as nombre')
            ->where('idAgent',0)
            ->groupBy('mois')
            ->get()
            ->keyBy('mois');

        return response()->view('Statistiques', compact('sessionsParMois','sessionsPreEnrParMois', 'sessionsParMois', 'adultesPerRegion', 'mineursPerRegion', 'regions', 'nbre_enr', 'nbre_agts', 'nbre_CE', 'nbre_SPE', 'pFemmes', 'pHommes', 'st_matri', 'pourcentagesGroupesSanguins', 'PSA'));
    }
}
