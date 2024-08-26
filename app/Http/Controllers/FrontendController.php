<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perusahaan;

class FrontendController extends Controller
{
  
    public function index()
{
    $zalik = Perusahaan::all(); 
    return view('Frontend.LayOut.Halaman.index', compact('zalik'));
}

}
