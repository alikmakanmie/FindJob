<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perusahaan;

class FrontendController extends Controller
{
  
    public function index()
    {
        return view('Frontend.LayOut.Halaman.userprofile');
    }

    public function perusahaan()
    {
        $perusahaan = Perusahaan::all();  // Angka 12 bisa disesuaikan
        return view('Frontend.LayOut.Halaman.perusahaan', compact('perusahaan'));
    }

    public function tampilkanperusahaan($id)
    {
        $perusahaan = Perusahaan::find($id);
        return view('Frontend.LayOut.Halaman.lihatdetail', compact('perusahaan'));
    }
}
