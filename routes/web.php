<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\DonneesDemographiquesController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\MultiStepForm;
use App\Models\DonneesDemographiques;

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

Route::get('/', function () {
    return view('welcome');
})->name('home')->middleware('auth');


Route::get('/error', function () {
    $error = session('error');
    return view('errors.database', compact('error'));
})->name('errorPage');


Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login.submit');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');


Route::resource('agents', AgentController::class)->middleware('auth');

Route::controller(AgentController::class)->group(function(){
    Route::put('upPW', 'updatePass')->name('agents.updatePass');
    Route::get('edPW', 'editPass')->name('agents.editPass');
});

Route::resource('ddForm', DonneesDemographiquesController::class)->middleware('auth');

