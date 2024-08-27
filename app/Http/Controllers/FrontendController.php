<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perusahaan;

class FrontendController extends Controller
{
  
    public function index()
    {
        $perusahaans = Perusahaan::paginate(12); // Angka 12 bisa disesuaikan
        return view('Frontend.LayOut.Halaman.perusahaan', compact('perusahaans'));
    }

}
