<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Redirect;

class authCustom
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        session_start(); //recuper info di sessione

        if (!isset($_SESSION['logged'])) { // se non è settato
            return Redirect::to(route('user.login'));
        }

        return $next($request); //altrimenti vai avanti
    }
}
