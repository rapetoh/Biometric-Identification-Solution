<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhotoController extends Controller
{
    
    public function createPhoto(){
        return view('DD.Photo');
    }

    public function storePhoto(){
        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('app');
            return response()->json(['message' => 'Photo enregistrée avec succès', 'path' => $path]);
        }

        return response()->json(['message' => 'Aucun fichier fourni'], 400)
    }

}
