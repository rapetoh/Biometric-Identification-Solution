<?php

namespace App\Http\Controllers;

use App\Models\DonneesDemographiques;
use App\Models\SessionEnrolement;
use App\Models\Identifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;



class IdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dossiers = Identifications::get();
        return view('identification.idList', compact('dossiers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('identification.id');
    }

    // Controller
    public function idtreatment(Request $request)
    {
        try {
            $niu = $request->input('le_niu');
            $niu_int = intval($niu);

            $identifiedPrim = SessionEnrolement::where('NIU', $niu_int)->where('est_validee', 1)->first();

            if (isset($identifiedPrim)) {
                $identified = DonneesDemographiques::where('NIU', $identifiedPrim->NIU)->first();
                // ...
            } else {
                return response()->json(['message' => "L'individu identifié doit d'abord être validé pour pouvoir apparaitre ici"]);
            }


            Log::info($identified);

            $realNIU = (string) $identified->NIU;

            session()->forget('identified');

            session(['identified' => $identified]);

            Log::info('Identifiééé:' . session('identified'));

            return response()->json(['message' => 'Individu identifié avec succès', 'identity' => session('identified'), 'realNIU' => $realNIU]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Erreur dans la restitution des info identifiées'], 400);
        }
    }


    public function logID(Request $request)
    {

        Log::info("Received data: ", $request->all());
        try {
            Identifications::create(
                [
                    'nom' => $request->input('nom'),
                    'prenom' => $request->input('prenom'),
                    'NIU' => $request->input('NIU'),
                    'sexe' => $request->input('sexe'),
                    'telephone' => $request->input('telephone'),
                    'domicile' => $request->input('domicile'),
                    'lieu_identification' => $request->input('latitude') . ',' . $request->input('longitude'),
                ]
            );
        } catch (\Exception $e) {
            Log::error("Error processing the request: " . $e->getMessage());
            return response()->json(['message' => 'Erreur dans la journalisation de l\'identification'], 400);
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
