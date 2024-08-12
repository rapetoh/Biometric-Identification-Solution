<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SessionEnrolement;


class IndividuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dossiers = SessionEnrolement::with(['individu', 'agent', 'donneesDemographiques', 'donneesBiometriques'])->where('est_validee', 1)->get();

        return response()->view('IndividusEnrolés', compact('dossiers'));
    }

    public function searchIndividuFolder(Request $request)
    {

        $search = $request->search;

        if ($search == '') {
            return redirect()->route('individu.index');
        }



        $dossiers = SessionEnrolement::with(['individu', 'agent', 'donneesDemographiques', 'donneesBiometriques'])
            ->where(function ($query) use ($search) {
                $query->where('NIU', 'LIKE', '%' . $search . '%');
            })
            ->get();

        return response()->view('IndividusEnrolés', compact('dossiers', 'search'));
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
