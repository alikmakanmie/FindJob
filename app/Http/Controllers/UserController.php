<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function dashboard()
    {
        return view('user.dashboard');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:15',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'nullable|in:laki-laki,perempuan',
            // validasi lain yang diperlukan
        ]);

        $user = Auth::user();
        $pengguna = $user->pengguna ?? new Pengguna(['user_id' => $user->id]);

        $pengguna->nama_lengkap = $request->input('nama_lengkap');
        $pengguna->alamat = $request->input('alamat');
        $pengguna->nomor_telepon = $request->input('nomor_telepon');
        $pengguna->tanggal_lahir = $request->input('tanggal_lahir');
        $pengguna->jenis_kelamin = $request->input('jenis_kelamin');
        // simpan data lain yang diperlukan

        Log::info('Data Pengguna:', $pengguna->toArray());

        $pengguna->save();

        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }
}