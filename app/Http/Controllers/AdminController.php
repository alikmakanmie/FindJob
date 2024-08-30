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
            'nama_perusahaan' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Buat pengguna baru dengan status menunggu
        $user = User::create([
            'name' => $request->nama_perusahaan,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'perusahaan',
            'status' => 'menunggu',
        ]);

        // Periksa apakah pengguna berhasil dibuat
        if ($user) {
            \Log::info('Pengguna baru berhasil dibuat dengan status menunggu: ' . $user->id);
            Auth::login($user); // Pastikan ini berhasil
            return redirect()->route('perusahaan.survey')->with('success', 'Pendaftaran berhasil. Silakan lengkapi survei berikut.');
        } else {
            \Log::error('Gagal membuat pengguna baru');
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mendaftar. Silakan coba lagi.');
        }
    }

    public function approve(User $user)
    {
        $user->status = 'disetujui';
        $user->role = 'user';
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

    public function survey()
    {
        return view('perusahaan.survey');
    }

    public function storeSurvey(Request $request)
    {
        $validatedData = $request->validate([
            'nama_perusahaan' => 'required|string|max:255',
            'alamat' => 'required|string',
            'telepon' => 'required|string|max:15',
            'email' => 'required|email|unique:perusahaan,email',
            'industri' => 'required|string',
            // Tambahkan validasi lain sesuai kebutuhan
        ]);

        $perusahaan = new Perusahaan($validatedData);
        $perusahaan->user_id = auth()->id();
        $perusahaan->save();

        return redirect()->route('home')->with('success', 'Data survey berhasil disimpan.');
    }
}