<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\DonneesBiometriques;
use App\Models\DonneesDemographiques;
use App\Models\Individu;
use App\Models\SessionEnrolement;
use App\Models\SessionPreEnrolement;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;
use App\Mail\PreEnrollMail;
use App\Rules\CustomRule;


class Pre_Enrôlement extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 'ee';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('PreEnr');
    }



    // public function printPDF_Pre_enrolement($id)
    // {
    //     $idArray = [
    //         'id' => $id,
    //     ];
    //     $pdf = Pdf::loadView('PreEnrReceipt', $idArray);

    //     return $pdf->download('Référence.pdf');
    // }

    public function receipt($receipt_id)
    {
        $id = $receipt_id;
        return view('PreEnrReceipt', compact('id'));
    }


    private function isConnectedToInternet()
    {
        $host = 'www.google.com'; // ou tout autre serveur distant
        $port = 80; // port HTTP

        $fp = @fsockopen($host, $port, $errno, $errstr, 10);

        if ($fp) {
            fclose($fp);
            return true;
        } else {
            return false;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $client = new \GuzzleHttp\Client([
            'verify' => storage_path('app/cacert.pem')  // Chemin vers le fichier cacert.pem
        ]);

        $request->validate([
            'nom' => 'required|string|min:2|regex:/^[a-zA-ZÀ-ÿ\s-]+$/|max:255',
            'prenom' => 'required|string|min:2|regex:/^[a-zA-ZÀ-ÿ\s-]+$/|max:255',
            'sexe' => 'required|in:Masculin,Féminin',
            'nomJeuneFille' => 'nullable|string|min:2|regex:/^[a-zA-ZÀ-ÿ\s-]+$/|max:255',
            'dateNaissance' => 'required|date|before:1 years ago',
            'paysVilleNaissance' => 'required|string|regex:/^[a-zA-ZÀ-ÿ\s-]+$/|max:255',
            'paysVilleResidence' => 'required|string|regex:/^[a-zA-ZÀ-ÿ\s-]+$/|max:255',
            'quartierResidence' => 'required|string|regex:/^[a-zA-ZÀ-ÿ\s-]+$/|max:255',
            'statutMatrimonial' => 'required|in:Célibataire,Marié(e),Divorcé(e),Veuf(ve)',
            'nomPrenomsConjoint' => 'nullable|string|min:3|regex:/^[a-zA-ZÀ-ÿ\s-]+$/|max:255',
            'tel1' => ['nullable', 'string', 'min:8', 'max:15', 'unique:donnees_demographiques,tel1', new CustomRule($client)],
            'tel2' => ['nullable', 'string', 'min:8', 'max:15', new CustomRule($client)],
            'mail' => 'nullable|email|max:255|unique:donnees_demographiques,mail',
            'numPersonnePrevenir1' => ['required_without_all:mail,tel1', 'string', 'max:255', new CustomRule($client)],
            'nomPersonnePrevenir1' => 'required_without_all:mail,tel1|string|min:3|regex:/^[a-zA-ZÀ-ÿ\s-]+$/|max:255',
            'numPersonnePrevenir2' => ['required_without_all:mail,tel1', 'string', 'max:255', new CustomRule($client)],
            'nomPersonnePrevenir2' => 'required_without_all:mail,tel1|string|min:3|regex:/^[a-zA-ZÀ-ÿ\s-]+$/|max:255',
            'profession' => 'required|string|min:3|regex:/^[a-zA-ZÀ-ÿ\s-]+$/|max:255',
            'secteurEmploi' => 'required|string|in:Primaire,Secondaire,Tertiaire,Quaternaire,Autre',
            'autreSecteur' => 'nullable|string|max:255|min:3|regex:/^[a-zA-ZÀ-ÿ\s-]+$/|required_if:secteurEmploi,Autre',
            'groupeSanguin' => 'required|string|in:A+,A-,B+,B-,AB+,AB-,O+,O-',
        ]);

        function generateLargeRandomNumber($length = 17) {
            if ($length < 1) {
                return '0'; // Juste pour éviter les erreurs de longueur non valide
            }
        
            // Génère le premier chiffre entre 1 et 9 pour éviter les zéros initiaux
            $result = (string) mt_rand(1, 9);
        
            // Génère le reste des chiffres
            for ($i = 1; $i < $length; $i++) {
                $result .= mt_rand(0, 9);
            }
        
            return $result;
        }
        $NIU_int = generateLargeRandomNumber();
        $ref_Enr = Uuid::uuid4()->toString();
        $ref_Enr_short = substr($ref_Enr, 0, 25);

        $data = $request->only([
            'nom',
            'prenom',
            'nomJeuneFille',
            'sexe',
            'dateNaissance',
            'paysVilleNaissance',
            'paysVilleResidence',
            'quartierResidence',
            'statutMatrimonial',
            'nomPrenomsConjoint',
            'tel1',
            'tel2',
            'mail',
            'numPersonnePrevenir1',
            'nomPersonnePrevenir1',
            'numPersonnePrevenir2',
            'nomPersonnePrevenir2',
            'profession',
            'secteurEmploi',
            'autreSecteur',
            'groupeSanguin'
        ]);

        DB::beginTransaction();


        try {

            $connected = $this->isConnectedToInternet();

            if ($connected) {
                if ($request->filled('mail')) {
                    Mail::to($data['mail'])->send(new PreEnrollMail($ref_Enr_short));
                }

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
                        'secteur_emploi' => $data['secteurEmploi'] === 'Autre' ? $data['autreSecteur'] : $data['secteurEmploi'],
                        //'autre_secteur' => $data['autreSecteur'],
                        'groupe_sanguin' => $data['groupeSanguin'],
                        'pieces_justificatives' => 'Aucune',
                        'ref_enrolement' => $ref_Enr_short,
                        'idAgent' => 0,
                        'nom_de_jeune_fille' => $data['nomJeuneFille'],
                    ]
                );

                Individu::create(
                    [
                        'NIU' => $NIU_int,
                        'nom' => $data['nom'],
                        'prenom' => $data['prenom'],
                        'telephone' => $data['tel1'],
                    ]
                );

                DonneesBiometriques::create(
                    [
                        'NIU' => $NIU_int,
                        'ref_enrolement' => $ref_Enr_short,
                        'idAgent' => 0,
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
                        'idAgent' => 0,
                        'idDDemo' => $DD->idDDemo,
                        'idDBio' => $DB->idDBio,
                    ]
                );

                SessionPreEnrolement::create(
                    [
                        'nom_individu' => $data['nom'],
                        'prenom_individu' => $data['prenom'],
                        'mail_individu' => $data['mail'],
                        'telephone_individu1' => $data['tel1'],
                        'telephone_individu2' =>  $data['tel2'],
                        'NIU' => $NIU_int,
                        'ref_enrolement' => $ref_Enr_short,
                        'idDDemo' => $DD->idDDemo,
                    ]
                );

                DB::commit();
            } else {
                throw new \Exception('Pas de connexion internet !');
            }
            notify()->success('Données démographiques enrégistrées avec succès!', 'Succès');
            return redirect()->route('PreEnrReceipt', ['receipt_id' => $ref_Enr_short]);
        } catch (\Exception $e) {
            DB::rollBack();
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
