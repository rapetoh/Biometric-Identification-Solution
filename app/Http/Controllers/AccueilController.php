<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Support\Facades\Storage;

use App\Models\SessionEnrolement;

use Illuminate\Http\Request;

class AccueilController extends Controller
{
    public function create(){

        $directory = 'validated';

        // Obtenir tous les fichiers du dossier
        $dir = Storage::directories($directory);

        // Compter le nombre de fichiers
        $dircount = count($dir);

        $non_validated_elements = SessionEnrolement::where('est_validee',0)->where('idAgent','!=',0)->get();

        $dossier_pre_enr = SessionEnrolement::where('est_validee',0)->where('idAgent',0)->get();

        $count_dossier_pre_enr = $dossier_pre_enr->count();

        $count = $non_validated_elements->count();

        $adminAgents = Agent::where('isAdmin',1)
             ->where('idRegion',auth()->user()->idRegion)
             ->where('exist',1)
             ->get();

        return view('welcome',compact('adminAgents','count','dircount','count_dossier_pre_enr'));
    }
}
