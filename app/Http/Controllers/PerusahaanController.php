<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perusahaan;

class PerusahaanController extends Controller
{
    /**
     * Menampilkan daftar perusahaan.
     */
    public function index()
    {
    $perusahaan = Perusahaan::all(); // atau query lain sesuai kebutuhan
    return view('Frontend.LayOut.Halaman.index', compact('perusahaan'));
    }

    /**
     * Menampilkan formulir untuk membuat perusahaan baru.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Menyimpan perusahaan baru ke dalam penyimpanan.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'telepon' => 'required|string|max:15',
            'email' => 'required|email|unique:perusahaan,email'
        ]);

        Perusahaan::create($request->all());

        return redirect()->route('admin.store')
            ->with('success', 'Perusahaan berhasil ditambahkan.');
    }

    /**
     * Menampilkan perusahaan tertentu.
     */
    public function show(Perusahaan $perusahaan)
    {
        return view('Frontend.LayOut.Halaman.lihatdetail', compact('perusahaan'));
    }

    /**
     * Menampilkan formulir untuk mengedit perusahaan tertentu.
     */
    public function edit(Perusahaan $perusahaan)
    {
        return view('perusahaan.edit', compact('perusahaan'));
    }

    /**
     * Memperbarui perusahaan tertentu dalam penyimpanan.
     */
    public function update(Request $request, Perusahaan $perusahaan)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'telepon' => 'required|string|max:15',
            'email' => 'required|email|unique:perusahaan,email,' . $perusahaan->id
        ]);

        $perusahaan->update($request->all());

        return redirect()->route('perusahaan.index')
            ->with('success', 'Perusahaan berhasil diperbarui.');
    }

    /**
     * Menghapus perusahaan tertentu dari penyimpanan.
     */
    public function destroy(Perusahaan $perusahaan)
    {
        $perusahaan->delete();

        return redirect()->route('perusahaan.index')
            ->with('success', 'Perusahaan berhasil dihapus.');
    }
}
