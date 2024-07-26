<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureCategoryHasCars
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * 
     */

    public function handle(Request $request, Closure $next,...$cars): Response
    
    {foreach($cars as $car)
        if ( $request->category()->hasCar($car))
        {
            return "cannot be deleted";
        }
        

        return $next($request);
    }
}
