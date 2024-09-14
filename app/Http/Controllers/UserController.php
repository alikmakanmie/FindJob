<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $pengguna = $user->pengguna ?? new Pengguna(['user_id' => $user->id]);
        return view('Frontend.LayOut.Halaman.userprofile', compact('pengguna'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:15',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'nullable|in:laki-laki,perempuan',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto_ktp' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // validasi lain yang diperlukan
        ]);

        $user = Auth::user();
        $pengguna = $user->pengguna ?? new Pengguna(['user_id' => $user->id]);

        $pengguna->nama_lengkap = $request->input('nama_lengkap');
        $pengguna->alamat = $request->input('alamat');
        $pengguna->nomor_telepon = $request->input('nomor_telepon');
        $pengguna->tanggal_lahir = $request->input('tanggal_lahir');
        $pengguna->jenis_kelamin = $request->input('jenis_kelamin');

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($pengguna->foto && Storage::exists($pengguna->foto)) {
                Storage::delete($pengguna->foto);
            }

            $foto = $request->file('foto');
            $fotoName = time() . '_' . $foto->getClientOriginalName();
            $fotoPath = $foto->storeAs('public/images/user', $fotoName);
            $pengguna->foto = Storage::url($fotoPath);
        }

        if ($request->hasFile('foto_ktp')) {
            // Hapus foto KTP lama jika ada
            if ($pengguna->foto_ktp && Storage::exists($pengguna->foto_ktp)) {
                Storage::delete($pengguna->foto_ktp);
            }

            $fotoKtp = $request->file('foto_ktp');
            $fotoKtpName = time() . '_' . $fotoKtp->getClientOriginalName();
            $fotoKtpPath = $fotoKtp->storeAs('public/images/user', $fotoKtpName);
            $pengguna->foto_ktp = Storage::url($fotoKtpPath);
        }

        Log::info('Data Pengguna:', $pengguna->toArray());

        $pengguna->save();

        if ($pengguna->status_data == 'lengkap') {
            return redirect()->route('home')->with('success', 'Profil berhasil diperbarui.');
        }
        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }

    public function updateFoto(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = Auth::user();
        $pengguna = $user->pengguna ?? new Pengguna(['user_id' => $user->id]);

        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($pengguna->foto && Storage::exists($pengguna->foto)) {
                Storage::delete($pengguna->foto);
            }

            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $uniqueId = uniqid(); // Membuat ID unik untuk setiap foto
                $name = $user->name . '_' . $uniqueId . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('images/user'), $name);
                $pengguna->foto = 'images/user/' . $name;
            }
        }

        $pengguna->save();

        return redirect()->back()->with('success', 'Foto profil berhasil diperbarui.');
    }
    
}