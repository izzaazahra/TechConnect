<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah pengguna sudah login
        if (Auth::check()) {
            // Cek apakah rute yang diminta adalah login
            if ($request->is('/login') || $request->is('/register')) {
                return redirect()->route('account.dashboard'); // Redirect ke dashboard jika sudah login dan mencoba mengakses halaman login atau register
            }
        }

        return $next($request); // Lanjutkan ke request berikutnya jika belum login
    }
}
