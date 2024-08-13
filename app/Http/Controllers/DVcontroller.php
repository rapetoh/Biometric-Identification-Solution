<?php

namespace App\Http\Controllers;

use App\Models\DonneesBiometriques;
use App\Models\DonneesDemographiques;
use App\Models\Individu;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\SessionEnrolement;
use Spatie\Browsershot\Browsershot;  // Pour utiliser Browsershot
use Response;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Session;
use App\Rules\CustomRule;



class DVcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showModalPage($id)
    {
        $item = DonneesDemographiques::findOrFail($id);

        Session::put('niu', $item->NIU);

        return view('DD.modal_content', compact('item'));
    }


    public function generatePDF()
    {
        $pdf = PDF::loadView('DD.test'); // Assurez-vous que cette vue existe et est simple
        return $pdf->stream('simple.pdf');
    }


    public function storeCarte(Request $request)
    {

        $folderName = session('niu');

        $storagePath = 'validated/' . $folderName;
        $storagePath2 = 'toUpload/' . $folderName;
        try {

            if ($request->hasFile('image')) {

                $path = $request->file('image')->storeAs($storagePath, $request->file('image')->getClientOriginalName(), 'local');
                $path = $request->file('image')->storeAs($storagePath2, $request->file('image')->getClientOriginalName(), 'local');
                return response()->json(['message' => 'carte enregistrée avec succès', 'path' => $path]);
            } else {
                return response()->json(['message' => 'Carte non enregistrée']);
            }
        } catch (\Exception $e) {
            return response()->json(['message' => 'Carte non enregistrée' . $e]);
        }
    }


    public function generateAndPrintPdf($id)
    {
        $DD = DonneesDemographiques::find($id);

        $data = [
            'nom' => $DD->nom,
            'prenom' => $DD->prenom,
            'sexe' => $DD->sexe,
            'NIU' => $DD->NIU,
            'DOB' => $DD->DOB,
            'GS' => $DD->groupe_sanguin,
            'adresse_residence' => $DD->quartier_residence . ', ' . $DD->pays_ville_residence,
            'mail' => $DD->mail,
            'tel1' => $DD->tel1 . ' - ' . $DD->tel2,
            'PAP1' => $DD->nom_personne_a_prevenir1 . ' - ' . $DD->numero_personne_a_prevenir1,
            'PAP2' => $DD->nom_personne_a_prevenir2 . ' - ' . $DD->numero_personne_a_prevenir2,
            'pj' => $DD->pieces_justificatives,
            'statut_matrimonial' => $DD->statut_matrimonial,
            'npconjoint' => $DD->nom_prenom_conjoint,
            'profession' => $DD->profession,
            'njf' => $DD->nom_de_jeune_fille,
        ];

        // Generate HTML from Blade view
        $pdf = Pdf::loadView('DD.pdf', $data);

        return response($pdf->stream())
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'inline; filename="document.pdf"');
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $non_validated_elements = SessionEnrolement::with(['individu', 'agent', 'donneesDemographiques', 'donneesBiometriques'])->where('est_validee', 0)->get();

        $count = $non_validated_elements->count();

        return response()->view('DD.DVForm', compact('non_validated_elements', 'count'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $id = $request->input('id');
        $niu = $request->input('niu');
        $iddemo = $request->input('iddemo');
        $source = 'pièces_justificatives/' . $niu;  // Chemin relatif à storage/app
        $destination = 'validated/' . $niu;  // Chemin relatif à storage/app
        $destination2 = 'toUpload/' . $niu;  // Chemin relatif à storage/app

        $client = new \GuzzleHttp\Client([
            'verify' => storage_path('app/cacert.pem')  // Chemin vers le fichier cacert.pem
        ]);

        
        DB::beginTransaction();

        if ($request->input('input_disabled') === 'disabled') {
            try {

                $SE = SessionEnrolement::findOrFail($id);

                $SE->update(
                    [
                        'est_validee' => 1,
                    ]
                );

                Storage::makeDirectory($destination, 0777, true, true);
                Storage::makeDirectory($destination2, 0777, true, true);

                // Crée le répertoire de destination avec la structure complète
                $files = Storage::allFiles($source);
                $directories = Storage::allDirectories($source);

                // Déplace chaque fichier
                foreach ($files as $file) {
                    $newPath2 = str_replace($source, $destination2, $file);
                    Storage::copy($file, $newPath2);
                    $newPath = str_replace($source, $destination, $file);
                    Storage::move($file, $newPath);
                    
                }

                // Déplace chaque dossier et recrée leur structure dans le nouveau chemin
                foreach ($directories as $dir) {
                    $newDirPath = str_replace($source, $destination, $dir);
                    // Assure que le nouveau dossier existe avant de déplacer
                    if (!Storage::exists($newDirPath)) {
                        Storage::makeDirectory($newDirPath);
                    }

                    $newDirPath2 = str_replace($source, $destination2, $dir);
                    // Assure que le nouveau dossier existe avant de déplacer
                    if (!Storage::exists($newDirPath2)) {
                        Storage::makeDirectory($newDirPath2);
                    }
                    //copier vers le dossier upload to
                    $subFiles2 = Storage::allFiles($dir);
                    foreach ($subFiles2 as $subFile) {
                        $newSubFilePath = str_replace($source, $destination2, $subFile);
                        Storage::copy($subFile, $newSubFilePath);
                    }
                    // Déplacer les fichiers dans le nouveau sous-dossier
                    $subFiles = Storage::allFiles($dir);
                    foreach ($subFiles as $subFile) {
                        $newSubFilePath = str_replace($source, $destination, $subFile);
                        Storage::move($subFile, $newSubFilePath);
                    }
                    //Storage::deleteDirectory($dir);  // Supprime l'ancien répertoire
                }


                DB::commit();
                notify()->success('1 dossier validé', 'succès');
                return redirect()->route('modal.page', ['id' => $iddemo]);
            } catch (\Exception $e) {
                DB::rollBack();
                notify()->error('La validaiton du dossier a échoué. ' . $e->getMessage() . '.', 'Erreur');
                return redirect()->back()->withErrors($e->getMessage());
            }
        } else if ($request->input('input_disabled') === 'enabled') {
            try {

                $request->validate([
                    'nom' => 'required|string|max:255',
                    'prenom' => 'required|string|max:255',
                    'sexe' => 'required|in:Masculin,Féminin',
                    'nomJeuneFille' => 'nullable|string|max:255',
                    'dateNaissance' => 'required|date|before:1 years ago',
                    'paysVilleNaissance' => 'required|string|max:255',
                    'paysVilleResidence' => 'required|string|max:255',
                    'quartierResidence' => 'required|string|max:255',
                    'statutMatrimonial' => 'required|in:Célibataire,Marié(e),Divorcé(e),Veuf(ve)',
                    'nomPrenomsConjoint' => 'nullable|string|max:255',
                    'tel1' => [
                        'nullable', 
                        'string', 
                        'min:8', 
                        'max:15', 
                        'unique:donnees_demographiques,tel1,' . $iddemo . ',idDDemo', 
                        new CustomRule($client)
                    ],
                    'tel2' => [
                        'nullable', 
                        'string', 
                        'min:8', 
                        'max:15', 
                        new CustomRule($client)
                    ],
                    'mail' => 'nullable|email|max:255|unique:donnees_demographiques,mail,' . $iddemo . ',idDDemo',
                    'numPersonnePrevenir1' => 'required_without_all:mail,tel1|string|max:255',
                    'nomPersonnePrevenir1' => 'required_without_all:mail,tel1|string|max:255',
                    'numPersonnePrevenir2' => 'required_without_all:mail,tel1|string|max:255',
                    'nomPersonnePrevenir2' => 'required_without_all:mail,tel1|string|max:255',
                    'profession' => 'required|string|max:255',
                    'secteurEmploi' => 'required|string|in:Primaire,Secondaire,Tertiaire,Quaternaire,Autre',
                    'autreSecteur' => 'nullable|string|max:255|required_if:secteurEmploi,Autre',
                    'groupeSanguin' => 'required|string|in:A+,A-,B+,B-,AB+,AB-,O+,O-',
                ]);

                $data = $request->only([
                    'nom', 'prenom', 'nomJeuneFille', 'sexe', 'dateNaissance', 'paysVilleNaissance',
                    'paysVilleResidence', 'quartierResidence', 'statutMatrimonial', 'nomPrenomsConjoint',
                    'tel1', 'tel2', 'mail', 'numPersonnePrevenir1', 'nomPersonnePrevenir1', 'numPersonnePrevenir2', 'nomPersonnePrevenir2',
                    'profession', 'secteurEmploi', 'autreSecteur', 'groupeSanguin'
                ]);

                $individu = Individu::findOrFail($niu);
                $DD = DonneesDemographiques::findOrFail($iddemo);


                $individu->update(
                    [
                        'nom' => $data['nom'],
                        'prenom' => $data['prenom'],
                        'telephone' => $data['tel1'],
                    ]
                );

                $DD->update(
                    [
                        'sexe' => $data['sexe'] == 'Masculin' ? 'M' :  'F',
                        'nom' => $data['nom'],
                        'prenom' => $data['prenom'],
                        'tel1' => $data['tel1'],
                        'tel2' => $data['tel2'],
                        'mail' => $data['mail'],
                        'numero_personne_a_prevenir1' => $data['numPersonnePrevenir1'],
                        'numero_personne_a_prevenir2' => $data['numPersonnePrevenir2'],
                        'nom_personne_a_prevenir1' => $data['nomPersonnePrevenir1'],
                        'nom_personne_a_prevenir2' => $data['nomPersonnePrevenir2'],
                        'DOB' => $data['dateNaissance'],
                        'nom_prenom_conjoint' => $data['nomPrenomsConjoint'],
                        'pays_ville_naissance' => $data['paysVilleNaissance'],
                        'pays_ville_residence' => $data['paysVilleResidence'],
                        'quartier_residence' => $data['quartierResidence'],
                        'statut_matrimonial' => $data['statutMatrimonial'],
                        'profession' => $data['profession'],
                        'secteur_emploi' => $data['secteurEmploi'] === 'Autre' ? $data['autreSecteur'] : $data['secteurEmploi'],
                        //'autre_secteur' => $data['autreSecteur'],
                        'groupe_sanguin' => $data['groupeSanguin'],
                        'nom_de_jeune_fille' => $data['nomJeuneFille'],
                    ]
                );

                $SE = SessionEnrolement::findOrFail($id);

                $SE->update(
                    [
                        'est_validee' => 1,
                    ]
                );


                Storage::makeDirectory($destination2, 0777, true, true);
                Storage::makeDirectory($destination, 0777, true, true);

                // Crée le répertoire de destination avec la structure complète
                $files = Storage::allFiles($source);
                $directories = Storage::allDirectories($source);

                // Déplace chaque fichier
                foreach ($files as $file) {
                    $newPath2 = str_replace($source, $destination2, $file);
                    Storage::copy($file, $newPath2);
                    $newPath = str_replace($source, $destination, $file);
                    Storage::move($file, $newPath);
                }

                // Déplace chaque dossier et recrée leur structure dans le nouveau chemin
                foreach ($directories as $dir) {
                    $newDirPath = str_replace($source, $destination, $dir);
                    // Assure que le nouveau dossier existe avant de déplacer
                    if (!Storage::exists($newDirPath)) {
                        Storage::makeDirectory($newDirPath);
                    }
                    $newDirPath2 = str_replace($source, $destination2, $dir);
                    // Assure que le nouveau dossier existe avant de déplacer
                    if (!Storage::exists($newDirPath2)) {
                        Storage::makeDirectory($newDirPath2);
                    }
                    //copier vers le dossier upload to
                    $subFiles2 = Storage::allFiles($dir);
                    foreach ($subFiles2 as $subFile) {
                        $newSubFilePath = str_replace($source, $destination2, $subFile);
                        Storage::copy($subFile, $newSubFilePath);
                    }
                    // Déplacer les fichiers dans le nouveau sous-dossier
                    $subFiles = Storage::allFiles($dir);
                    foreach ($subFiles as $subFile) {
                        $newSubFilePath = str_replace($source, $destination, $subFile);
                        Storage::move($subFile, $newSubFilePath);
                    }
                    Storage::deleteDirectory($dir);  // Supprime l'ancien répertoire
                }

                DB::commit();
                notify()->success('1 dossier validé', 'succès');
                return redirect()->route('modal.page', ['id' => $iddemo]);
            } catch (\Exception $e) {
                DB::rollBack();
                notify()->error('La validaiton du dossier a échoué. ' . $e->getMessage() . '.', 'Erreur');
                return redirect()->back()->withErrors($e->getMessage());
            }
        }

        // Vérifie si le dossier destination n'existe pas pour éviter tout écrasement

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $iddemo = $request->input('iddemo');
        $idbio = $request->input('idbio');
        try {
            $SE = SessionEnrolement::findOrFail($id);
            $DD = DonneesDemographiques::findOrFail($iddemo);
            $ind = Individu::findOrFail($SE->NIU);
            $DB = DonneesBiometriques::findOrFail($idbio);
            $source = 'pièces_justificatives/' . $SE->NIU;  // Chemin relatif à storage/app
            $SE->delete();
            $DD->delete();
            $ind->delete();
            $DB->delete();
            Storage::deleteDirectory($source);
            notify()->success('Dossier supprimé avec succès!', 'Succès');
            return redirect()->back()->with('success', 'Agent supprimé avec succès.');
        } catch (\Illuminate\Database\QueryException $e) {
            // Gestion des erreurs de requête SQL (base de données hors ligne, etc.)
            notify()->error('Erreur de base de données: ' . $e->getMessage(), 'Erreur');
            return redirect()->back()->with('error', 'Erreur de base de données: Impossible de supprimer l\'agent.');
        } catch (\Exception $e) {
            notify()->error($e->getMessage(), 'Erreur');
            return redirect()->back()->with('error', 'Erreur lors de la suppression du dossier.');
        }
    }
}
