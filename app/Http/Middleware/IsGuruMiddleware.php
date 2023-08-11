<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsGuruMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Memeriksa apakah pengguna saat ini adalah guru (role = 'guru')
        if (Auth::user() && Auth::user()->role === 'guru') {
            return $next($request);
        }

        // Jika bukan guru, maka kembalikan ke halaman lain atau tampilkan pesan error
        return redirect()->route('siswaOnlyPage')->with('error', 'Akses ditolak.');
    }
}
