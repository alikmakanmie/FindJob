<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengguna;

class PenggunaController extends Controller
{
    /**
     * Menampilkan daftar pengguna.
     */
    public function index()
    {
        $penggunas = Pengguna::latest()->paginate(5);
        return view('Frontend.LayOut.Index', compact('penggunas'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Menampilkan form untuk membuat pengguna baru.
     */
    public function create()
    {
        return view('Frontend.LayOut.Create');
    }

    /**
     * Menyimpan pengguna baru ke database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:laki-laki,perempuan',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto_ktp' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status_pekerjaan' => 'required|string|max:255',
        ]);
    
        $data = $request->except(['foto', 'foto_ktp']);
        $data['user_id'] = auth()->id();

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoName = time() . '_foto_' . $foto->getClientOriginalName();
            $foto->storeAs('public/images/user', $fotoName);
            $data['foto'] = 'storage/images/user/' . $fotoName;
        }

        if ($request->hasFile('foto_ktp')) {
            $fotoKtp = $request->file('foto_ktp');
            $fotoKtpName = time() . '_foto_ktp_' . $fotoKtp->getClientOriginalName();
            $fotoKtp->storeAs('public/images/ktp', $fotoKtpName);
            $data['foto_ktp'] = 'storage/images/ktp/' . $fotoKtpName;
        }
    
        try {
            \Log::info('Data yang akan disimpan: ' . json_encode($data));
            $pengguna = Pengguna::create($data);
            \Log::info('Pengguna berhasil dibuat dengan ID: ' . $pengguna->id);
            return redirect()->route('userprofile')->with('success', 'Profil berhasil dibuat.');
        } catch (\Exception $e) {
            \Log::error('Error saat membuat profil: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat membuat profil. Silakan coba lagi.');
        }
    }

    /**
     * Menampilkan detail pengguna tertentu.
     */
    public function show(Pengguna $pengguna)
    {
        return view('Frontend.LayOut.Show',compact('pengguna'));
    }

    /**
     * Menampilkan form untuk mengedit pengguna tertentu.
     */
    public function edit(Pengguna $pengguna)
    {
        return view('Frontend.LayOut.Edit',compact('pengguna'));
    }

    /**
     * Memperbarui pengguna tertentu di database.
     */
    public function update(Request $request, Pengguna $pengguna)
    {
        $request->validate([
            'nama' => 'required',
            'nomor_telepon' => 'nullable|numeric',
            'alamat' => 'nullable',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'nullable|in:laki-laki,perempuan',
        ]);
    
        $pengguna->update($request->all());
    
        return redirect()->route('penggunas.index')
                        ->with('success','Pengguna berhasil diperbarui');
    }

    /**
     * Menghapus pengguna tertentu dari database.
     */
    public function destroy(Pengguna $pengguna)
    {
        $pengguna->delete();
    
        return redirect()->route('penggunas.index')
                        ->with('success','Pengguna berhasil dihapus');
    }
}