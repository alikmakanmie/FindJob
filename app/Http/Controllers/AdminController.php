<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        // Ambil semua pengguna dari database
        $users = User::all();

        // Kirim data pengguna ke view
        return view('admin.akun', compact('users'));
    }

    public function upgradeRole(User $user)
    {
        $user->role = 'perusahaan';
        $user->save();

        return redirect()->back()->with('success', 'Peran pengguna berhasil diupgrade ke Perusahaan.');
    }
}