<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CentreEnrolement;

class CentreEnrolementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ces = CentreEnrolement::where('idRegion', auth()->user()->idRegion)->get();

        return view('CE.CEList', compact('ces'));
    }

    public function searchCE(Request $request)
    {

        $search = $request->search;

        $ces = CentreEnrolement::where(function ($query) use ($search) {
                $query->where('idCentre', 'LIKE', '%' . $search . '%')
                    ->orWhere('nom', 'LIKE', '%' . $search . '%')
                    ->orWhere('adresse', 'LIKE', '%' . $search . '%');
            })
            ->where('idRegion', auth()->user()->idRegion)
            ->get();

        return view('CE.CEList', compact('ces','search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('CE.addCE');
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
            'nom' => 'required|string',
            'tel1' => 'required|min:8|max:8|unique:agents,telephone',
            'adresse' => 'required|string',
            'commune' => 'required|string',
        ]);

        try {
            CentreEnrolement::create(
                [
                    'nom' => $request->nom,
                    'telephone' => $request->tel1,
                    'commune' => $request->commune,
                    'adresse' => $request->adresse,
                    'idRegion' => auth()->user()->region->idRegion
                ]
            );

            notify()->success('Nouveau CE créé avec succès', 'Succès');

            return redirect()->back();
        } catch (\Exception $e) {
            // Log the error or handle it as per your needs
            report($e);

            notify()->error('La création du CE a échoué. ' . $e->getMessage() . '.', 'Erreur');
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
        $ce = CentreEnrolement::findOrFail($id);
        return view('CE.editCE', compact('ce'));
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
        $request->validate([
            'nom' => 'required|string',
            'tel1' => 'required|min:8|max:8',
            'adresse' => 'required|string',
        ]);

        try {
            $CE = CentreEnrolement::findOrFail($id);

            $CE->update(
                [
                    'nom' => $request->nom,
                    'telephone' => $request->tel1,
                    'adresse' => $request->adresse,
                ]
            );
            notify()->success('CE modifié avec succès!', 'Succès');

            return redirect()->back();
        } catch (\Exception $e) {
            // Log the error or handle it as per your needs
            report($e);

            notify()->error('La modification du CE a échoué. ' + $e->getMessage() + '.', 'Erreur');
            return redirect()->back()->withErrors($e->getMessage());
        }
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
            $CE = CentreEnrolement::findOrFail($id);
            $CE->delete();
            notify()->success('CE supprimé avec succès!', 'Succès');
            return redirect()->route('ce.index')->with('success', 'Agent supprimé avec succès.');
        } catch (\Illuminate\Database\QueryException $e) {
            // Gestion des erreurs de requête SQL (base de données hors ligne, etc.)
            notify()->error('Erreur de base de données: ' . $e->getMessage(), 'Erreur');
            return redirect()->back()->with('error', 'Erreur de base de données: Impossible de supprimer CE.');
        } catch (\Exception $e) {
            notify()->error($e->getMessage(), 'Erreur');
            return redirect()->back()->with('error', 'Erreur lors de la suppression du CE.');
        }
    }
}
