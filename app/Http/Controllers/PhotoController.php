<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DonneesBiometriques;
use App\Models\Individu;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class PhotoController extends Controller
{
    
    public function createPhoto(){
        return view('DD.Photo');
    }

    public function storePhoto(Request $request){
        // if(session('niu') == null || session('refEnr') == null){
        // }
        $folderName = session('niu');

        $storagePath = 'pièces_justificatives/' . $folderName;

        DB::beginTransaction();

        try {

            if ($request->hasFile('photo')) {

                $path = $request->file('photo')->storeAs($storagePath, 'photo' . $folderName . "." . $request->file('photo')->extension(), 'local');

                $DB = DonneesBiometriques::where('ref_enrolement',session('refEnr'))->first();

                $id = $DB->getAttribute('idDBio');

                $DB_to_modify = DonneesBiometriques::findOrFail($id);

                $DB_to_modify->update(
                    [
                        'photo'=>"C:/Users/rapetoh/Desktop/Docs 3eme annee IAI/Semestre 6/STAGES 2023-2024/e-ID/storage/app/".$path,
                    ]
                );

                DB::commit();


                notify()->success('Enrôlement de l\'Individu terminée avec succès !', 'Succès');
                Session::forget([
                    'refEnr',
                    'niu',
                    'nom',
                    'mail',
                    'nomJeuneFille',
                    'statutMatrimonial',
                    'nomPrenomsConjoint',
                    'prenom',
                    'sexe',
                    'dateNaissance',
                    'lieuNaissance',
                    'numPersonnePrevenir1',
                    'numPersonnePrevenir2',
                    'profession',
                    'quartierResidence',
                    'paysVilleResidence',
                ]);
                //redirect()->route('home');
                return response()->json(['message' => 'Photo enregistrée avec succès', 'path' => $path,'redirect' => route('home')]);
            }
            else{
                notify()->error('Veuillez renseigner une photo', 'Erreur');
            }
        } catch (\Exception $e) {
            DB::rollBack();
            notify()->error('Photo non enrégistrée. Réssayez.', 'Erreur');
            return response()->json(['message' => 'Aucun fichier fourni'], 400);
        }
        
    }

}
