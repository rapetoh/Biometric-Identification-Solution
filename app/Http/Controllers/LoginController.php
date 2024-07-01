<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;


class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/';

    protected function authenticated(Request $request, $user)
    {
        notify()->success('Agent connecté avec succès!', 'Succès');

        $agent = Auth::user();

        return redirect()->intended($this->redirectPath());
    }


}
