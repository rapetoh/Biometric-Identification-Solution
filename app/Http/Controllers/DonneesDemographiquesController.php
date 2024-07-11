<?php

namespace App\Http\Controllers;

use App\Models\DonneesBiometriques;
use App\Models\DonneesDemographiques;
use App\Models\Individu;
use App\Models\SessionEnrolement;
use App\Models\SessionPreEnrolement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;


use Ramsey\Uuid\Uuid;


class DonneesDemographiquesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('DD.DDForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
            'tel1' => 'nullable|string|min:8|max:15,unique:donnees_demographiques,tel1',
            'tel2' => 'nullable|string|min:8|max:15',
            'mail' => 'nullable|email|max:255|unique:donnees_demographiques,mail',
            'numPersonnePrevenir1' => 'required_without_all:mail,tel1|string|max:255',
            'nomPersonnePrevenir1' => 'required_without_all:mail,tel1|string|max:255',
            'numPersonnePrevenir2' => 'required_without_all:mail,tel1|string|max:255',
            'nomPersonnePrevenir2' => 'required_without_all:mail,tel1|string|max:255',
            'profession' => 'required|string|max:255',
            'secteurEmploi' => 'required|string|in:Primaire,Secondaire,Tertiaire,Quaternaire,Autre',
            'autreSecteur' => 'nullable|string|max:255|required_if:secteurEmploi,Autre',
            'groupeSanguin' => 'required|string|in:A+,A-,B+,B-,AB+,AB-,O+,O-',
        ]);


        $cniCheckbox = $request->has('cniCheckbox');
        $passportCheckbox = $request->has('passportCheckbox');
        $birthCertCheckbox = $request->has('birthCertCheckbox');
        $marriageCertCheckbox = $request->has('marriageCertCheckbox');
        $nationalityCertCheckbox = $request->has('nationalityCertCheckbox');
        $divorceCertCheckbox = $request->has('divorceCertCheckbox');
        $deathCertCheckbox = $request->has('deathCertCheckbox');




        notify()->success('Validation terminée avec succès!', 'Succès');
        $pieces_justificatives = [];



        // Définir les correspondances entre les noms de cases à cocher et les noms des documents
        $documents = [
            'cniCheckbox' => 'CNI',
            'passportCheckbox' => 'Passeport',
            'birthCertCheckbox' => 'Acte de Naissance',
            'marriageCertCheckbox' => 'Certificat de Mariage',
            'nationalityCertCheckbox' => 'Certificat de Nationalité',
            'divorceCertCheckbox' => 'Certificat de Divorce',
            'deathCertCheckbox' => 'Certificat de Décès du Conjoint'
        ];

        $files = [
            'cniCheckbox' => 'cniFile',
            'passportCheckbox' => 'passportFile',
            'birthCertCheckbox' => 'birthCertFile',
            'marriageCertCheckbox' => 'marriageCertFile',
            'nationalityCertCheckbox' => 'nationalityCertFile',
            'divorceCertCheckbox' => 'divorceCertFile',
            'deathCertCheckbox' => 'deathCertFile'
        ];

        foreach (array_keys($documents) as $key) {
            if ($request->input($key) === 'checked' & $request->hasFile($files[$key])) {
                $pieces_justificatives[] = $documents[$key];
            }
        }
        Log::info('Pièces justificatives: ' . json_encode($pieces_justificatives));



        $imploded_pieces = implode(', ', $pieces_justificatives);
        Log::info('Imploded Pieces: ' . $imploded_pieces);


        $NIU = Uuid::uuid4();
        $NIU_int = hexdec(substr($NIU, 0, 16));


        $ref_Enr = Uuid::uuid4()->toString();
        $ref_Enr_short = substr($ref_Enr, 0, 25);


        // Récupération des données du formulaire
        $data = $request->only([
            'nom', 'prenom', 'nomJeuneFille', 'sexe', 'dateNaissance', 'paysVilleNaissance',
            'paysVilleResidence', 'quartierResidence', 'statutMatrimonial', 'nomPrenomsConjoint',
            'tel1', 'tel2', 'mail', 'numPersonnePrevenir1', 'nomPersonnePrevenir1','numPersonnePrevenir2', 'nomPersonnePrevenir2',
            'profession', 'secteurEmploi', 'autreSecteur', 'groupeSanguin'
        ]);
         

        
        $folderName = (string) $NIU_int;


        DB::beginTransaction();

        try {
            // Ensure the directory exists or create it
            // $folderPath = storage_path('app/' . $folderName);
            // if (!file_exists($folderPath)) {
            //     mkdir($folderPath, 0777, true);
            // }
            // Define the full storage path for files
            $storagePath = 'pièces_justificatives/' . $folderName;
        
            Log::info('Handling file upload');
            // Process each file and store it in the designated folder
            if ($request->hasFile('cniFile')) {
                $cniFile = $request->file('cniFile')->storeAs($storagePath, 'cni.' . $request->file('cniFile')->extension(), 'local');
                Log::info('CNI file uploaded successfully');
            }
            else{
                Log::info('CNI file not uploaded');
            }
            if ($request->hasFile('passportFile')) {
                $passportFile = $request->file('passportFile')->storeAs($storagePath, 'passport.' . $request->file('passportFile')->extension(), 'local');
                Log::info('Passport file uploaded successfully');
            } else {
                Log::info('Passport file not uploaded');
            }
            
            if ($request->hasFile('birthCertFile')) {
                $birthCertFile = $request->file('birthCertFile')->storeAs($storagePath, 'birthCert.' . $request->file('birthCertFile')->extension(), 'local');
                Log::info('Birth certificate file uploaded successfully');
            } else {
                Log::info('Birth certificate file not uploaded');
            }
            
            if ($request->hasFile('marriageCertFile')) {
                $marriageCertFile = $request->file('marriageCertFile')->storeAs($storagePath, 'marriageCert.' . $request->file('marriageCertFile')->extension(), 'local');
                Log::info('Marriage certificate file uploaded successfully');
            } else {
                Log::info('Marriage certificate file not uploaded');
            }
            
            if ($request->hasFile('nationalityCertFile')) {
                $nationalityCertFile = $request->file('nationalityCertFile')->storeAs($storagePath, 'nationalityCert.' . $request->file('nationalityCertFile')->extension(), 'local');
                Log::info('Nationality certificate file uploaded successfully');
            } else {
                Log::info('Nationality certificate file not uploaded');
            }
            
            if ($request->hasFile('divorceCertFile')) {
                $divorceCertFile = $request->file('divorceCertFile')->storeAs($storagePath, 'divorceCert.' . $request->file('divorceCertFile')->extension(), 'local');
                Log::info('Divorce certificate file uploaded successfully');
            } else {
                Log::info('Divorce certificate file not uploaded');
            }
            
            if ($request->hasFile('deathCertFile')) {
                $deathCertFile = $request->file('deathCertFile')->storeAs($storagePath, 'deathCert.' . $request->file('deathCertFile')->extension(), 'local');
                Log::info('Death certificate file uploaded successfully');
            } else {
                Log::info('Death certificate file not uploaded');
            }
            
        
            notify()->success('Fichiers enregistrés avec succès!', 'Succès');
        } catch (\Exception $e) {
            report($e);
            notify()->error('L\'enregistrement des pièces a échoué. ' . $e->getMessage(), 'Erreur');
            return redirect()->back()->withErrors($e->getMessage());
        }
        
        
        if (count($pieces_justificatives)>=2){
            try {


                Individu::create(
                    [
                        'NIU' => $NIU_int,
                        'nom' => $data['nom'],
                        'prenom' => $data['prenom'],
                        'telephone' => $data['tel1'],
                    ]
                );
    
                DonneesDemographiques::create(
                    [
                        'NIU' => $NIU_int,
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
                        'secteur_emploi' => $data['secteurEmploi'] === 'Autre'? $data['autreSecteur'] : $data['secteurEmploi'],
                        //'autre_secteur' => $data['autreSecteur'],
                        'groupe_sanguin' => $data['groupeSanguin'],
                        'pieces_justificatives' => $imploded_pieces,
                        'ref_enrolement' => $ref_Enr_short,
                        'idAgent' => auth()->user()->idAgent,
                        'nom_de_jeune_fille' => $data['nomJeuneFille'],
                    ]
                );
    
                DonneesBiometriques::create(
                    [
                        'NIU' => $NIU_int,
                        'ref_enrolement' => $ref_Enr_short,
                        'idAgent' => auth()->user()->idAgent,
                    ]
                );
    
                $DB = DonneesBiometriques::where('ref_enrolement', $ref_Enr_short)->first();
    
                $DD = DonneesDemographiques::where('ref_enrolement', $ref_Enr_short)->first();
    
                Log::info('DD: ' . $DD->idDDemo);
                Log::info('DB: ' . $DB->idDBio);
    
                SessionEnrolement::create(
                    [
                        'NIU' => $NIU_int,
                        'ref_enrolement' => $ref_Enr_short,
                        'est_validee' => 0,
                        'idAgent' => auth()->user()->idAgent,
                        'idDDemo' => $DD->idDDemo,
                        'idDBio' => $DB->idDBio,
                    ]
                );
    
                SessionPreEnrolement::create(
                    [
                        'NIU' => $NIU_int,
                        'ref_enrolement' => $ref_Enr_short,
                        'idDDemo' => $DD->idDDemo,
                    ]
                );
    
                DB::commit();
                notify()->success('Individu enrégistré avec succès!', 'Succès');
                $request->session()->put('refEnr', $ref_Enr_short);
                $request->session()->put('niu', $folderName);
                $request->session()->put('nom', $data['nom']);
                $request->session()->put('prenom', $data['prenom']);
                return redirect()->route('dbForm.create');
            } catch (\Exception $e) {
    
                DB::rollBack();
                report($e);
    
                notify()->error('L\'enregistrement des données démographiques a échoué. ' . $e->getMessage() . '.', 'Erreur');
                return redirect()->back()->withErrors($e->getMessage());
            }
        }
        else{
            notify()->error('Un minimum de 2 pièces justificatives doivent être soumises !', 'Erreur');
            return redirect()->back()->withErrors('Un minimum de 2 pièces justificatives doivent être soumises !');
        }



        
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
    public function destroy($id)
    {
        //
    }
}
