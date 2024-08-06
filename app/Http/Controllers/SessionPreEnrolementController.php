<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SessionEnrolement;

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
        $dossier = SessionEnrolement::with(['individu', 'agent', 'donneesDemographiques', 'donneesBiometriques'])->where('est_validee', 0)->where('idAgent', 0)->where('ref_enrolement', $ref)->get();
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
        //
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
