<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KebijakanDanPrivasiController extends Controller
{
    /**
     * Menampilkan halaman kebijakan dan privasi.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('perusahaan.home');
    }

    /**
     * Menampilkan halaman upgrade ke akun perusahaan.
     *
     * @return \Illuminate\View\View
     */
    public function daftarPerusahaan()
    {
        return view('perusahaan.daftar');
    }

    /**
     * Memproses permintaan upgrade ke akun perusahaan.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function prosesUpgrade(Request $request)
    {
        // Logika untuk memproses upgrade akun
        // Implementasi validasi dan penyimpanan data

        return redirect()->route('perusahaan.home')->with('success', 'Permintaan upgrade berhasil dikirim.');
    }
}
