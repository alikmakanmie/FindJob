<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('Frontend.LayOut.Halaman.index');
    }

    public function userProfile()
    {
        return view('Frontend.LayOut.Halaman.userprofile');
    }

    // Tambahkan method lain untuk halaman-halaman frontend lainnya di sini
    // Contoh:
    // public function about()
    // {
    //     return view('Frontend.LayOut.Halaman.about');
    // }
    //
    // public function contact()
    // {
    //     return view('Frontend.LayOut.Halaman.contact');
    // }
}
