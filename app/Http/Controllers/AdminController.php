<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $users = User::where('name', 'LIKE', "%{$search}%")
                     ->orWhere('email', 'LIKE', "%{$search}%")
                     ->paginate(10);
    
        return view('admin.akun', compact('users'));
    }
    
    public function viewPermintaan()
    {
        $permintaan = auth()->user()->notifications()
                        ->where('type', 'App\Notifications\NewCompanyRegistration')
                        ->where('read_at', null)
                        ->orderBy('created_at', 'desc')
                        ->paginate(10);

        return view('admin.permintaan', compact('permintaan'));
    }

    public function upgradeRole(User $user)
    {
        $user->role = 'perusahaan';
        $user->save();
        return redirect()->back()->with('success', 'Peran pengguna berhasil diupgrade ke Perusahaan.');
    }

    public function downgradeRole(User $user)
    {
        $user->role = 'user';
        $user->save();

        return redirect()->back()->with('success', 'Peran pengguna berhasil diturunkan menjadi User.');
    }

}