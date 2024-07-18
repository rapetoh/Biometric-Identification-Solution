<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\CentreEnrolementController;
use App\Http\Controllers\DonneesDemographiquesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PhotoController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\MultiStepForm;
use App\Models\DonneesDemographiques;
use App\Http\Controllers\DonneesBiometriquesController;
use App\Http\Controllers\DVcontroller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AccueilController::class, 'create'])->name('home')->middleware('auth');


Route::get('/error', function () {
    $error = session('error');
    return view('errors.database', compact('error'));
})->name('errorPage');


Route::post('/google/auth', [GoogleController::class, 'redirectToGoogle']);
Route::get('/google/callback', [GoogleController::class, 'handleGoogleCallback']);
Route::post('/google/upload', [GoogleController::class, 'uploadToDrive'])->name('upload.drive')->middleware('auth');


Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login.submit');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');


Route::resource('agents', AgentController::class)->middleware('auth');

Route::controller(AgentController::class)->group(function(){
    Route::put('upPW', 'updatePass')->name('agents.updatePass');
    Route::get('edPW', 'editPass')->name('agents.editPass');
});

Route::resource('ddForm', DonneesDemographiquesController::class)->middleware('auth');

Route::resource('dvForm', DVcontroller::class)->middleware('auth');

Route::get('/pdf/{iddemo}', [DVcontroller::class, 'generateAndPrintPdf'])->middleware('auth')->name('pdf.generate');

Route::resource('dbForm', DonneesBiometriquesController::class)->middleware('auth');

Route::resource('ce', CentreEnrolementController::class)->middleware('auth');

Route::get('photo', [PhotoController::class, 'createPhoto'])->name('photo');
Route::post('photo', [PhotoController::class, 'storePhoto'])->name('photo.store');

// Route::get('/pieces_justificatives/{filename}', function ($filename) {
//     // Vérifier si l'utilisateur est authentifié
//     if (!Auth::check()) {
//         abort(403, 'Unauthorized');
//     }

//     // Définir le chemin complet du fichier
//     $path = storage_path('app/pieces_justificatives/' . $filename);

//     // Vérifier si le fichier existe
//     if (!File::exists($path)) {
//         abort(404, 'File not found');
//     }

//     // Récupérer le fichier et son type MIME
//     $file = File::get($path);
//     $type = File::mimeType($path);

//     // Créer une réponse avec le contenu du fichier et le type MIME approprié
//     $response = Response::make($file, 200);
//     $response->header("Content-Type", $type);

//     return $response;
// })->middleware('auth');