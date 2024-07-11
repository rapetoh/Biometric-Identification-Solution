<?php

namespace App\Http\Controllers;

use App\Models\DonneesBiometriques;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DonneesBiometriquesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        return view('DD.DBForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();

        try{

        $cheminPouce = "C:/Users/rapetoh/Desktop/Docs 3eme annee IAI/Semestre 6/STAGES 2023-2024/e-ID/storage/app/pièces_justificatives/".session('niu')."/".$request->input('pouce').session('niu')."bin";
        $cheminIndex = "C:/Users/rapetoh/Desktop/Docs 3eme annee IAI/Semestre 6/STAGES 2023-2024/e-ID/storage/app/pièces_justificatives/".session('niu')."/".$request->input('index').session('niu')."bin";
        $cheminMajeur = "C:/Users/rapetoh/Desktop/Docs 3eme annee IAI/Semestre 6/STAGES 2023-2024/e-ID/storage/app/pièces_justificatives/".session('niu')."/".$request->input('majeur').session('niu')."bin";
        $cheminAnnulaire = "C:/Users/rapetoh/Desktop/Docs 3eme annee IAI/Semestre 6/STAGES 2023-2024/e-ID/storage/app/pièces_justificatives/".session('niu')."/".$request->input('annulaire').session('niu')."bin";
        $cheminAuriculaire = "C:/Users/rapetoh/Desktop/Docs 3eme annee IAI/Semestre 6/STAGES 2023-2024/e-ID/storage/app/pièces_justificatives/".session('niu')."/".$request->input('auriculaire').session('niu')."bin";

        $DB = DonneesBiometriques::where('ref_enrolement',session('refEnr'))->first();

        $id = $DB->getAttribute('idDBio');

        $DB_to_modify = DonneesBiometriques::findOrFail($id);

        $DB_to_modify->update(
            [
                'empreinte_pouce'=>$cheminPouce,
                'empreinte_index'=>$cheminIndex,
                'empreinte_majeur'=>$cheminMajeur,
                'empreinte_annulaire'=>$cheminAnnulaire,
                'empreinte_auriculaire'=>$cheminAuriculaire,
            ]
            );
            DB::commit();
            notify()->success('Empreintes enrégistrées avec succès. ', 'Succès');
            // return redirect()->route('home');
        }
        catch(\Exception $e){
            DB::rollBack();
            report($e);
            notify()->error('L\'enregistrement des données biométriques a échoué. Réssayez plus tard. ' . $e->getMessage() . '.', 'Erreur');
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

    }
}
