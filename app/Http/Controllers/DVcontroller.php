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

class DVcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function generateAndPrintPdf(Request $request)
    {

        $id = $request->query('iddemo');

        $DD = DonneesDemographiques::findOrFail($id);

        $data = [
            'nom' => $DD->nom,
            'prenom' => $DD->prenom,
            // 'sexe' => $request->query('sexe', '--'),
            // 'NIU' => $request->query('NIU', '--'),
            // 'DOB' => $request->query('DOB', '--'),
            // 'GS' => $request->query('GS', '--'),
            // 'adresse_residence' => $request->query('adresse_residence', '--'),
            // 'mail' => $request->query('mail', '--'),
            // 'tel1' => $request->query('tel1', '--'),
            // 'PAP1' => $request->query('PAP1', '--'),
            // 'PAP2' => $request->query('PAP2', '--'),
            // 'pj' => $request->query('pj', '--'),
            // 'statut_matrimonial' => $request->query('statut_matrimonial', '--'),
            // 'npconjoint' => $request->query('npconjoint', '--'),
            // 'profession' => $request->query('profession', '--'),
            // 'njf' => $request->query('njf', '--'),
        ];

        // Generate HTML from Blade view
        $pdf = Pdf::loadView('DD.pdf', $data);

        return $pdf->stream('document.pdf');
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

                // Crée le répertoire de destination avec la structure complète
                $files = Storage::allFiles($source);
                $directories = Storage::allDirectories($source);

                // Déplace chaque fichier
                foreach ($files as $file) {
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
                return redirect()->back();
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
                    'tel1' => 'nullable|string|min:8|max:15,unique:donnees_demographiques,tel1,' . $iddemo . ',idDDemo',
                    'tel2' => 'nullable|string|min:8|max:15',
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


                Storage::makeDirectory($destination, 0777, true, true);

                // Crée le répertoire de destination avec la structure complète
                $files = Storage::allFiles($source);
                $directories = Storage::allDirectories($source);

                // Déplace chaque fichier
                foreach ($files as $file) {
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
                return redirect()->back();
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
