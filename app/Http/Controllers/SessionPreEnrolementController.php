<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SessionEnrolement;
use App\Models\SessionPreEnrolement;
use App\Models\DonneesDemographiques;
use App\Models\DonneesBiometriques;
use App\Models\Individu;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;



class SessionPreEnrolementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dossiers = SessionEnrolement::with(['individu', 'agent', 'donneesDemographiques', 'donneesBiometriques'])->where('est_validee', 0)->where('idAgent', 0)->get();

        return response()->view('PE.ListDossiersPreEnr', compact('dossiers'));
    }

    public function pj($ref)
    {
        $dossier = SessionEnrolement::with(['individu', 'agent', 'donneesDemographiques', 'donneesBiometriques'])->where('est_validee', 0)->where('idAgent', 0)->where('ref_enrolement', $ref)->get()->first();
        Log::info('Dossierrr: ' . $dossier);
        session()->put('refEnr', $dossier->ref_enrolement);
        session()->put('niu', $dossier->NIU);
        session()->put('nom', $dossier->donneesDemographiques->nom);
        session()->put('mail', $dossier->donneesDemographiques->mail);
        session()->put('prenom', $dossier->donneesDemographiques->prenom);
        session()->put('statutMatrimonial', $dossier->donneesDemographiques->statut_matrimonial);

        return response()->view('PE.pj');
    }

    public function searchPEFolder(Request $request)
    {

        $search = $request->search;

        if ($search == '') {
            return redirect()->route('Session_Pre_Enrollement.index');
        }



        $dossiers = SessionEnrolement::with(['individu', 'agent', 'donneesDemographiques', 'donneesBiometriques'])
            ->where(function ($query) use ($search) {
                $query->where('ref_enrolement', 'LIKE', '%' . $search . '%');
            })
            ->get();

        return response()->view('PE.ListDossiersPreEnr', compact('dossiers', 'search'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Log::info('Fichier téléchargé : ' . $request->file('cniFile')->getPathname());
        $request->validate([
            'cniFile' => 'file|mimes:pdf|max:2048',
            'passportFile' => 'file|mimes:pdf|max:2048',
            'birthCertFile' => 'file|mimes:pdf|max:2048',
            'marriageCertFile' => 'file|mimes:pdf|max:2048',
            'nationalityCertFile' => 'file|mimes:pdf|max:2048',
            'divorceCertFile' => 'file|mimes:pdf|max:2048',
            'deathCertFile' => 'file|mimes:pdf|max:2048',
        ]);


        $pieces_justificatives = [];
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


        try {

            if (!session()->has('niu')) {

                throw new Exception('Pas de NIU trouvé pour ce individu, impossible de poursuivre!');
            }

            $folderName = (string) session('niu');

            $storagePath = 'pièces_justificatives/' . $folderName;

            Log::info('Handling file upload');
            // Process each file and store it in the designated folder
            if ($request->hasFile('cniFile')) {
                $cniFile = $request->file('cniFile')->storeAs($storagePath, 'cni.' . $request->file('cniFile')->extension(), 'local');
                Log::info('CNI file uploaded successfully');
            } else {
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
        } catch (\Exception $e) {
            report($e);
            notify()->error('L\'enregistrement des pièces a échoué. ' . $e->getMessage(), 'Erreur');
            return redirect()->back()->withErrors($e->getMessage());
        }

        DB::beginTransaction();

        if (count($pieces_justificatives) >= 1) {
            try {


                $SE = SessionEnrolement::where('ref_enrolement', session('refEnr'))->first();
                $DD = DonneesDemographiques::where('ref_enrolement', session('refEnr'))->first();
                $DB = DonneesBiometriques::where('ref_enrolement', session('refEnr'))->first();
                $SE->update(
                    [
                        'idAgent' => auth()->user()->idAgent,
                    ]
                );
                $DB->update(
                    [
                        'idAgent' => auth()->user()->idAgent,
                    ]
                );
                $DD->update(
                    [
                        'pieces_justificatives' => $imploded_pieces,
                        'idAgent' => auth()->user()->idAgent,
                    ]
                );
                DB::commit();
                notify()->success('Pièces justificatives enrégistrées avec succès!', 'Succès');
                return redirect()->route('dbForm.create');
            } catch (\Exception $e) {
                DB::rollBack();
                report($e);
                notify()->error('Erreur d\'enrégistrement des données en base. Ressayez!' . $e->getMessage() . '.', 'Erreur');
                return redirect()->back()->withErrors($e->getMessage());
            }
        } else {
            notify()->error('Un minimum de 1 pièce justificative doit être soumis !', 'Erreur');
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
        try {

            $SE = SessionEnrolement::findOrFail($id);
            $ref_enr = $SE->getAttribute('ref_enrolement');
            $niu = $SE->getAttribute('NIU');
            Individu::where('NIU', $niu)->delete();
            SessionPreEnrolement::where('ref_enrolement', $ref_enr)->delete();
            DonneesDemographiques::where('ref_enrolement', $ref_enr)->delete();
            DonneesBiometriques::where('ref_enrolement', $ref_enr)->delete();
            $SE->delete();

            notify()->success('Dossier supprimé avec succès!', 'Succès');
            return redirect()->route('Session_Pre_Enrollement.index')->with('success', 'Dossier de pré-enrolement supprimé avec succès.');

        } catch (\Exception $e) {

            notify()->error($e->getMessage(), 'Erreur');
            return redirect()->back()->with('error', 'Erreur lors de la suppression du dossier.');
            
        }
    }
}
