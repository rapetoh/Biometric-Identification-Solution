<?php

namespace App\Http\Controllers;

use App\Models\DonneesDemographiques;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class IdController extends Controller
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
        return response()->view('identification.id');
    }

   // Controller
public function idtreatment(Request $request)
{
    try {
        $niu = $request->input('le_niu');
        $niu_int = intval($niu);

        $identified = DonneesDemographiques::where('NIU', $niu_int)->first();

        session()->forget('identified');

        session(['identified' => $identified]);

        return response()->json(['message' => 'Individu identifié avec succès', 'identity' => session('identified')]);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Erreur dans la restitution des info identifiées'], 400);
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
