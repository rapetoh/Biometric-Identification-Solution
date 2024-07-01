<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Redirect;

class HandleDatabaseErrors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            return $next($request);
        } catch (\Illuminate\Database\QueryException $e) {
            $errorMessage = $e->getMessage();
            // Gestion des erreurs de base de données
            // notify()->error('Erreur de base de données: ' . $e->getMessage(), 'Erreur');
            return Redirect::route('errorPage')->with('error', 'Erreur de base de données : ' . $errorMessage);
            // Redirect::back()->with('error', 'Erreur de base de données: Impossible de compléter l\'opération.');

            // Vous pouvez également logger l'erreur ici si nécessaire
        }
    }
}
