<?php

namespace App\Http\Controllers;

use App\Models\DonneesBiometriques;
use App\Models\DonneesDemographiques;
use App\Models\Individu;
use App\Models\SessionEnrollement;
use App\Models\SessionPreEnrollement;
use Illuminate\Http\Request;

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
            'dateNaissance' => 'required|date',
            'paysVilleNaissance' => 'required|string|max:255',
            'paysVilleResidence' => 'required|string|max:255',
            'quartierResidence' => 'required|string|max:255',
            'statutMatrimonial' => 'required|in:Célibataire,Marié(e),Divorcé(e),Veuf(ve)',
            'nomPrenomsConjoint' => 'nullable|string|max:255',
            'tel1' => 'required|string|min:8|max:8',
            'tel2' => 'nullable|string|min:8|max:8',
            'mail' => 'required|email|max:255|unique:donnees_demographiques,mail',
            'numPersonnePrevenir' => 'required|string|max:255',
            'nomPersonnePrevenir' => 'required|string|max:255',
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

        $cniCheckbox ?  $pieces_justificatives[] = 'CNI' : '';
        $passportCheckbox ?  $pieces_justificatives[] = 'Passport' : '';
        $birthCertCheckbox ?  $pieces_justificatives[] = 'Acte de naissance' : '';
        $marriageCertCheckbox ?  $pieces_justificatives[] = 'Acte de mariage' : '';
        $nationalityCertCheckbox ?  $pieces_justificatives[] = 'Acte de nationalité' : '';
        $divorceCertCheckbox ?  $pieces_justificatives[] = 'Acte de divorce' : '';
        $deathCertCheckbox ?  $pieces_justificatives[] = 'Acte de décès' : '';


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

        // foreach ($documents as $checkbox => $docName) {
        //     if ($request->has($checkbox)) {
        //         $pieces_justificatives[] = $docName;
        //     }
        // }


        $imploded_pieces = implode(', ', $pieces_justificatives);


        $NIU = Uuid::uuid4();
        $NIU_int = hexdec(substr($NIU, 0, 16));


        $ref_Enr = Uuid::uuid4()->toString();
        $ref_Enr_short = substr($ref_Enr, 0, 25);


        // Récupération des données du formulaire
        $data = $request->only([
            'nom', 'prenom', 'nomJeuneFille', 'sexe', 'dateNaissance', 'paysVilleNaissance',
            'paysVilleResidence', 'quartierResidence', 'statutMatrimonial', 'nomPrenomsConjoint',
            'tel1', 'tel2', 'mail', 'numPersonnePrevenir', 'nomPersonnePrevenir',
            'profession', 'secteurEmploi', 'autreSecteur', 'groupeSanguin'
        ]);
         

        
        $folderName = str($NIU_int);
        $folderPath = storage_path('app/' . $folderName);
        
        notify()->success('Paperasse terminée avec succès!', 'Succès');
        
        try {
           
            // Assurez-vous que le dossier existe ou créez-le
            if (!file_exists($folderPath)) {
                mkdir($folderPath, 0777, true);
            }

            // Traitement des fichiers
            if ($request->hasFile('cniFile')) {
                $cniFile = $request->file('cniFile')->storeAs($folderName, 'cni.' . $request->cniFile->extension(), 'local');
            }

            if ($request->hasFile('deathCertFile')) {
                $deathCertFile = $request->file('deathCertFile')->storeAs($folderName, 'deathCert.' . $request->cniFile->extension(), 'local');
            }

            if ($request->hasFile('divorceCertFile')) {
                $divorceCertFile = $request->file('divorceCertFile')->storeAs($folderName, 'divorceCert.' . $request->cniFile->extension(), 'local');
            }

            if ($request->hasFile('birthCertFile')) {
                $birthCertFile = $request->file('birthCertFile')->storeAs($folderName, 'birthCert.' . $request->cniFile->extension(), 'local');
            }

            if ($request->hasFile('marriageCertFile')) {
                $marriageCertFile = $request->file('marriageCertFile')->storeAs($folderName, 'marriageCert.' . $request->cniFile->extension(), 'local');
            }
            if ($request->hasFile('nationalityCertFile')) {
                $nationalityCertFile = $request->file('nationalityCertFile')->storeAs($folderName, 'nationalityCert.' . $request->cniFile->extension(), 'local');
            }
            // Répétez pour les autres fichiers
            if ($request->hasFile('passportFile')) {
                $passportFile = $request->file('passportFile')->storeAs($folderName, 'passport.' . $request->passportFile->extension(), 'local');
            }
            notify()->success('Fichiers enrégistrés avec succès!', 'Succès');
        } catch (\Exception $e) {
            report($e);

            notify()->error('L\'enregistrement des pièces a échoué. ' . $e->getMessage() . '.', 'Erreur');
            return redirect()->back()->withErrors($e->getMessage());
        }


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
                    'numero_personne_a_prevenir1' => $data['numPersonnePrevenir'],
                    'numero_personne_a_prevenir2' => $data['numPersonnePrevenir'],
                    'nom_personne_a_prevenir1' => $data['nomPersonnePrevenir'],
                    'nom_personne_a_prevenir2' => $data['nomPersonnePrevenir'],
                    'DOB' => $data['dateNaissance'],
                    'nom_prenom_conjoint' => $data['nomPrenomsConjoint'],
                    'pays_ville_naissance' => $data['paysVilleNaissance'],
                    'pays_ville_residence' => $data['paysVilleResidence'],
                    'quartier_residence' => $data['quartierResidence'],
                    'statut_matrimonial' => $data['statutMatrimonial'],
                    'profession' => $data['profession'],
                    'secteur_emploi' => $data['secteurEmploi'],
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

            $DB = DonneesBiometriques::where('ref_enrolement', $ref_Enr_short);

            $DD = DonneesDemographiques::where('ref_enrolement', $ref_Enr_short);

            SessionEnrollement::create(
                [
                    'NIU' => $NIU_int,
                    'ref_enrolement' => $ref_Enr_short,
                    'est_validee' => 0,
                    'idAgent' => auth()->user()->idAgent,
                    'idDDemo' => $DD->idDDemo,
                    'idDBio' => $DB->idDBio,
                ]
            );

            SessionPreEnrollement::create(
                [
                    'NIU' => $NIU_int,
                ]
            );

            notify()->success('Individu enrégistré avec succès!', 'Succès');
            return redirect()->route('dbForm.create')->with('refEnr', $ref_Enr_short);
        } catch (\Exception $e) {

            report($e);

            notify()->error('L\'enregistrement des données démographiques a échoué. ' . $e->getMessage() . '.', 'Erreur');
            return redirect()->back()->withErrors($e->getMessage());
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
