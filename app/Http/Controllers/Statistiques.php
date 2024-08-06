<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Statistiques extends Controller
{
    public function displayStat(){
        return response()->view('Statistiques');
    }
}
