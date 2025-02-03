<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Level
{
    /**
     * Handle an incoming request.
     *
     * @param  string  $id_level

     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $id_level): Response
    {
        if ($request->user()->id_level !== $id_level) {
            return redirect('dashboard');
        }
        return $next($request);
    }
}
