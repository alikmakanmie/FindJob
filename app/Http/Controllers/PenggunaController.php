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
            'nama' => 'required',
            'nomor_telepon' => 'nullable|numeric',
            'alamat' => 'nullable',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'nullable|in:laki-laki,perempuan',
        ]);
    
        Pengguna::create($request->all());
     
        return redirect()->route('penggunas.index')
                        ->with('success','Pengguna berhasil dibuat.');
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
