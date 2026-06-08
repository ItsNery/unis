<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackVisits
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->session()->has('has_visited')) {
            $request->session()->put('has_visited', true);
            
            $currentVisits = (int) \App\Models\ConfiguracionSitio::getValue('total_visits', 0);
            \App\Models\ConfiguracionSitio::setValue('total_visits', $currentVisits + 1);
        }

        return $next($request);
    }
}
