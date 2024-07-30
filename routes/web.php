<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\AccueilController;
use App\Http\Controllers\CentreEnrolementController;
use App\Http\Controllers\DonneesDemographiquesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\IdController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\MultiStepForm;
use App\Models\DonneesDemographiques;
use App\Http\Controllers\DonneesBiometriquesController;
use App\Http\Controllers\DVcontroller;
use App\Http\Controllers\Pre_Enrôlement;
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


Route::resource('Pre_Enrôlement', Pre_Enrôlement::class);


Route::get('Pre_Enrôlement', [Pre_Enrôlement::class,'create']);

Route::post('searchAgent', [AgentController::class, 'searchAgent'])->middleware('auth')->name('searchAgent');

Route::controller(AgentController::class)->group(function(){
    Route::put('upPW', 'updatePass')->name('agents.updatePass');
    Route::get('edPW', 'editPass')->name('agents.editPass');
});

Route::resource('ddForm', DonneesDemographiquesController::class)->middleware('auth');

Route::resource('dvForm', DVcontroller::class)->middleware('auth');

Route::get('modal-page/{id}', [DVcontroller::class, 'showModalPage'])->name('modal.page');

Route::post('carteStore', [DVcontroller::class, 'storeCarte'])->name('carte.store');

Route::get('/pdf/{iddemo}', [DVcontroller::class, 'generateAndPrintPdf'])->middleware('auth')->name('pdf.generate');

//Route::get('/printPDF_Pre_enrolement/{id}', [Pre_Enrôlement::class, 'printPDF'])->middleware('auth')->name('printPDF_Pre_enrolement');

Route::get('/receipt/{receipt_id}',  [Pre_Enrôlement::class, 'receipt'])->name('PreEnrReceipt');

Route::get('/generatePDF', [DVcontroller::class, 'generatePDF'])->middleware('auth');

Route::resource('dbForm', DonneesBiometriquesController::class)->middleware('auth');

Route::resource('ce', CentreEnrolementController::class)->middleware('auth');
Route::post('searchCE', [CentreEnrolementController::class, 'searchCE'])->middleware('auth')->name('searchCE');

Route::resource('id', IdController::class)->middleware('auth');

Route::get('photo', [PhotoController::class, 'createPhoto'])->name('photo');
Route::post('photo', [PhotoController::class, 'storePhoto'])->name('photo.store');
Route::post('identity', [IdController::class, 'idtreatment'])->name('id.find');

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