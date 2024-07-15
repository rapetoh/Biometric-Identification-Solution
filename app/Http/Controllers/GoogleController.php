<?php

 // Augmenter le temps d'exécution à 5 minutes


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Client;
use Google\Service\Drive;


set_time_limit(200); 

class GoogleController extends Controller
{
    private $client;

    public function __construct()
    {
        $this->client = new Client();
        $this->client->setClientId(env('GOOGLE_CLIENT_ID'));
        $this->client->setClientSecret(env('GOOGLE_CLIENT_SECRET'));
        $this->client->setRedirectUri(env('GOOGLE_REDIRECT_URI'));
        $this->client->setScopes(Drive::DRIVE);
        $this->client->setAccessType('offline');
        $this->client->setPrompt('select_account consent');

        $httpClient = new \GuzzleHttp\Client([
            'verify' => storage_path('app/cacert.pem'),
            'timeout' => 200.0, // Utilisez storage_path pour obtenir le chemin absolu
        ]);
        $this->client->setHttpClient($httpClient);

    }

    public function getDriveClient()
    {
        return $this->client;
    }

    public function redirectToGoogle()
    {
        $client = $this->getDriveClient();
        $authUrl = $client->createAuthUrl();
        return redirect()->to($authUrl);
    }

    public function handleGoogleCallback()
    {
        $client = $this->getDriveClient();
        if (request()->has('code')) {
            $token = $client->fetchAccessTokenWithAuthCode(request('code'));
            $client->setAccessToken($token);

            // Vous pouvez maintenant sauvegarder ce token dans une base de données ou une session pour des utilisations ultérieures
            session(['google_access_token' => $token]);
            notify()->success('Succès de l\'authentification au serveur distant', 'Succès');
            return redirect('/')->with('success', 'Authentifié avec Google Drive');
        }

        notify()->error('L\'authentification au serveur de stockage a échoué. ', 'Erreur');

        return redirect('/')->with('error', 'Échec de l\'authentification Google Drive');
    }

    public function uploadToDrive()
    {
        if (!session()->has('google_access_token')) {
            return redirect('/google/auth');
        }

        try {
            $client = $this->getDriveClient();
            $httpClient = new \GuzzleHttp\Client([
                'verify' => storage_path('app/cacert.pem'),
                'timeout' => 200.0,  // Timeout prolongé pour les uploads
            ]);
            $client->setHttpClient($httpClient);
            $client->setAccessToken(session('google_access_token'));
            $driveService = new Drive($client);
    
            $folderPath = storage_path('app/pièces_justificatives');
            $this->uploadDirectory($driveService, $folderPath, null);
    
            notify()->success('Synchronisation réussie !','Succès');
            return back()->with('success', 'Files uploaded successfully to Google Drive.');
        } catch (\Exception $e) {
            notify()->error('La synchronisation a échoué ! '.$e->getMessage(),'Erreur');
            return back()->with('error', 'Failed to upload files: ' . $e->getMessage());
        }

    }

    private function uploadDirectory($driveService, $dirPath, $parentId = null)
    {
        $files = scandir($dirPath);

        foreach ($files as $file) {

            if ($file == '.' || $file == '..') continue;

            $filePath = $dirPath . '/' . $file;

            if (is_dir($filePath)) {
                // Create folder on Google Drive and get the folder ID
                $fileMetadata = new Drive\DriveFile([
                    'name' => $file,
                    'mimeType' => 'application/vnd.google-apps.folder',
                    'parents' => $parentId ? [$parentId] : []
                ]);

                $createdFolder = $driveService->files->create($fileMetadata, [
                    'fields' => 'id'
                ]);

                // Recursively upload files in the folder
                $this->uploadDirectory($driveService, $filePath, $createdFolder->id);

            } else {

                $fileMetadata = new Drive\DriveFile([
                    'name' => $file,
                    'parents' => $parentId ? [$parentId] : [],
                ]);

                $driveService->files->create($fileMetadata, [
                    'data' => file_get_contents($filePath),
                    'mimeType' => mime_content_type($filePath),
                    'uploadType' => 'multipart',
                    'fields' => 'id'
                ]);
            }
        }
    }

    // public function uploadFile(Request $request)
    // {
       

    //     $driveService = new Drive($client);
    //     $file = new Drive\DriveFile();
    //     $file->setName("NomDuFichier");
    //     $content = file_get_contents($request->file('file')->getPathname());

    //     $createdFile = $driveService->files->create($file, [
    //         'data' => $content,
    //         'mimeType' => $request->file('file')->getMimeType(),
    //         'uploadType' => 'multipart'
    //     ]);

    //     return back()->with('success', 'Fichier envoyé avec succès');
    // }
}
