<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
    
    public function Permintaan()
    {
        $users = User::where('status', 'menunggu')->get();
        return view('admin.permintaan', compact('users'));
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

    public function storePermintaan(Request $request)
    {

        // Validasi input
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8',
        ]);

        // Dapatkan pengguna yang sedang login
        $user = Auth::user();

        // Periksa apakah email yang dimasukkan sama dengan email pengguna yang sedang login
        if ($user->email !== $request->email) {
            return redirect()->back()->with('error', 'Email yang dimasukkan harus sama dengan email akun Anda.');
        }

        // Perbarui status pengguna
        $user->status = 'menunggu';
        $user->save();

        // Periksa apakah data berhasil diperbarui
        if ($user->wasChanged()) {
            // Jika berhasil, tambahkan log atau debugging
            \Log::info('Status pengguna berhasil diperbarui: ' . $user->id);
            return redirect()->back()->with('success', 'Permintaan upgrade ke akun perusahaan telah diterima dan sedang menunggu persetujuan.');
        } else {
            // Jika gagal, tambahkan log error dan kembalikan pesan error
            \Log::error('Gagal memperbarui status pengguna');
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memproses permintaan. Silakan coba lagi.');
        }
    }

    public function approve(User $user)
    {
        $user->status = 'disetujui';
        $user->role = 'perusahaan';
        $user->save();

        // Tandai notifikasi sebagai sudah dibaca
        $notification = auth()->user()->notifications()
            ->where('type', 'App\Notifications\NewCompanyRegistration')
            ->where('data->user_id', $user->id)
            ->first();

        if ($notification) {
            $notification->markAsRead();
        }

        return redirect()->back()->with('success', 'Permintaan upgrade ke akun perusahaan telah disetujui.');
    }

    public function reject(User $user)
    {
        $user->status = 'ditolak';
        $user->save();

        // Tandai notifikasi sebagai sudah dibaca
        $notification = auth()->user()->notifications()
            ->where('type', 'App\Notifications\NewCompanyRegistration')
            ->where('data->user_id', $user->id)
            ->first();

        if ($notification) {
            $notification->markAsRead();
        }

        return redirect()->back()->with('success', 'Permintaan upgrade ke akun perusahaan telah ditolak.');
    }

}