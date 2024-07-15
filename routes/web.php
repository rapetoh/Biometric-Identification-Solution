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

Route::resource('dbForm', DonneesBiometriquesController::class)->middleware('auth');

Route::resource('ce', CentreEnrolementController::class)->middleware('auth');

Route::get('photo', [PhotoController::class, 'createPhoto'])->name('photo');
Route::post('photo', [PhotoController::class, 'storePhoto'])->name('photo.store');

