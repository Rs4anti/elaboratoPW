<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class isNotRegisteredUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ((!isset($_SESSION['role']))|| ($_SESSION['role'] == 'registered_user' || ($_SESSION['role'] == 'admin' ))) {
            return $next($request);
        }
        return response()->view('errors.404',['message' => 'Only external registered users can view this page!']);
    }
}
