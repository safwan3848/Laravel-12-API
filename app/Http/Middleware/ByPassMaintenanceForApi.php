<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ByPassMaintenanceForApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($this->shouldBypassMaintenance($request)) {
            return $next($request);
        }

        if(app()->isDownForMaintenance()) {
            abort(503);
        }
        return $next($request);
    }

    protected function shouldBypassMaintenance(Request $request): bool {
        return $request->is('api/*') || $request->expectsJson();
    }
}
