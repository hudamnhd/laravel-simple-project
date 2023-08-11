<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SaveIntendedUrl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Simpan URL halaman saat ini ke dalam sesi jika pengguna belum login.
        if (!$request->user()) {
            session(['url.intended' => $request->fullUrl()]);
        }
        return $next($request);
    }
}
