<?php

namespace App\Http\Controllers;


use App\Models\Perusahaan;
use App\Notifications\NewCompanyRegistration;
use Illuminate\Http\Request;
use App\Models\Notification;
use Illuminate\Support\Collection; // Added for collect() method
use Illuminate\Support\Facades\Auth;
use App\Models\User;



class HomeController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $perusahaan = Perusahaan::all(); // atau gunakan query yang sesuai
        $notifications = Notification::where('message', auth()->user()->id)->get();
        return view('Frontend.LayOut.Halaman.index', compact('perusahaan', 'notifications'));
    }
}