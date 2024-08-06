<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CekRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  mixed  ...$roles
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Pastikan user terautentikasi
        if (!$request->user()) {
            return redirect('/');
        }

        // Cek apakah level user termasuk dalam role yang dibutuhkan
        if (in_array($request->user()->role, $roles)) {
            return $next($request);
        }

        // Jika tidak memiliki akses, arahkan ke halaman utama atau halaman lain
        return redirect('/')->with('error', 'Unauthorized access.');
    }
}
