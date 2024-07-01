<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof \Illuminate\Auth\AuthenticationException) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Unauthenticated.'
                ], 401);
            }
            return redirect()->guest('login');
        }
        
        if ($exception instanceof \Illuminate\Validation\ValidationException) {
            return parent::render($request, $exception);
        }
        // Vous pouvez ajouter des conditions spécifiques pour différents types d'erreurs
        // ou traiter toutes les erreurs de la même manière
        return response()->view('errorPage', ['error' => $exception->getMessage()], 500);
    }

    //     public function render($request, Throwable $exception)
    // {
    //     if ($this->isHttpException($exception)) {
    //         notify()->error($exception->getMessage(), 'Erreur HTTP');
    //     } else {
    //         notify()->error('Une erreur serveur est survenue', 'Erreur Serveur');
    //     }

    //     return parent::render($request, $exception);
    // }
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }
}
