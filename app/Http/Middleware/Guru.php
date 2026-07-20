<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Guru
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Asumsinya pakai sistem autentikasi default Laravel
        $user = $request->user();

        // Kalau belum login atau rolenya bukan guru, lempar 404
        if (!$user || $user->role !== 'guru') {
            throw new NotFoundHttpException();
        }

        return $next($request);
    }
}
