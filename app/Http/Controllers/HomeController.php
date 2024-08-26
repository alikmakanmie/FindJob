<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // public function index()
    // {
    //     $perusahaan = Perusahaan::latest()->take(6)->get(); // Mengambil 6 perusahaan terbaru
    //     dd($perusahaan); // Ini akan menampilkan data perusahaan dan menghentikan eksekusi
    //     return view('Frontend.LayOut.Halaman.index', compact('perusahaan'));
    // }
}