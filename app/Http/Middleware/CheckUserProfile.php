<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserProfile
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $pengguna = $user->pengguna;

            if (!$pengguna || 
                is_null($pengguna->nama_lengkap) || 
                is_null($pengguna->alamat) || 
                is_null($pengguna->nomor_telepon) || 
                is_null($pengguna->tanggal_lahir) || 
                is_null($pengguna->jenis_kelamin)) {
                
                if ($request->route()->getName() !== 'userprofile') {
                    return redirect()->route('userprofile')->with('warning', 'Silakan lengkapi profil Anda terlebih dahulu.');
                }
            }
        }

        return $next($request);
    }
}
