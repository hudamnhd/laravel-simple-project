<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsSiswaMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Memeriksa apakah pengguna saat ini adalah siswa (role = 'siswa')
        if (Auth::user() && Auth::user()->role === 'siswa') {
            return $next($request);
        }

        // Jika bukan siswa, maka kembalikan ke halaman lain atau tampilkan pesan error
        return redirect()->route('guruOnlyPage')->with('error', 'Akses ditolak.');
    }
}
