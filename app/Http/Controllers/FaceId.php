<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FaceId extends Controller
{
    public function create()
    {
        return view('faceidView');
    }
    public function runCommands()
    {
        // $taskName = "IDFace";

        // Exécuter la tâche planifiée
        $output = shell_exec('schtasks /run /tn "IDFace"');


        sleep(15);

        return back()->with('error', 'Erreur lors de l\'exécution du script.');
    }

    public function runCommands_with_file(Request $request)
    {

        $request->validate([
            'faceToIdentify' => 'required|file|max:2048',
        ]);

        $file = $request->file('faceToIdentify');
        $fileName = $file->getClientOriginalName();
        $filePath = storage_path('app/uploads/' . $fileName);


        $file->move(storage_path('app/uploads'), $fileName);

        // Put the file path in file_location.txt
        $filePathTxt = storage_path('app/file_location.txt');
        file_put_contents($filePathTxt, $filePath);
    
        // Trigger the shell_exec function
        $output = shell_exec('schtasks /run /tn "FaceIDWithFile"');
    
        // Delete the file after processing

        sleep(15);

        unlink($filePath);

        return back()->with('error', 'Erreur lors de l\'exécution du script.');
    }
}
