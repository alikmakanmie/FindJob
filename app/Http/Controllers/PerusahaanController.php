<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perusahaan;
use App\Notifications\NewCompanyRegistration;
use App\Models\User;

class PerusahaanController extends Controller
{
    /**
     * Menampilkan daftar perusahaan.
     */
    public function index()
    {
    $perusahaan = Perusahaan::all(); // atau query lain sesuai kebutuhan
    return view('admin.store', compact('perusahaan'));
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
            'email' => 'required|email|unique:perusahaan,email',
            'deskripsi' => 'required|string',
            'deskripsi1' => 'nullable|string',
            'deskripsi2' => 'nullable|string', 
            'deskripsi3' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoName = time() . '_' . $foto->getClientOriginalName();
            $foto->move(public_path('images'), $fotoName);
            $data['foto'] = 'images/' . $fotoName;
        }

        if ($request->hasFile('foto1')) {
            $foto1 = $request->file('foto1');
            $foto1Name = time() . '_' . $foto1->getClientOriginalName();
            $foto1->move(public_path('images'), $foto1Name);
            $data['foto1'] = 'images/' . $foto1Name;
        }

        if ($request->hasFile('foto2')) {
            $foto2 = $request->file('foto2');
            $foto2Name = time() . '_' . $foto2->getClientOriginalName();
            $foto2->move(public_path('images'), $foto2Name);
            $data['foto2'] = 'images/' . $foto2Name;
        }

        Perusahaan::create($data);

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
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'email' => 'required|email|unique:perusahaan,email,' . $perusahaan->id,
            'deskripsi' => 'required',
            'deskripsi1' => 'nullable',
            'deskripsi2' => 'nullable',
            'deskripsi3' => 'nullable',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto1' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'foto2' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();

        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoName = time() . '_' . $foto->getClientOriginalName();
            $foto->move(public_path('images'), $fotoName);
            $data['foto'] = 'images/' . $fotoName;
        }

        if ($request->hasFile('foto1')) {
            $foto1 = $request->file('foto1');
            $foto1Name = time() . '_' . $foto1->getClientOriginalName();
            $foto1->move(public_path('images'), $foto1Name);
            $data['foto1'] = 'images/' . $foto1Name;
        }

        if ($request->hasFile('foto2')) {
            $foto2 = $request->file('foto2');
            $foto2Name = time() . '_' . $foto2->getClientOriginalName();
            $foto2->move(public_path('images'), $foto2Name);
            $data['foto2'] = 'images/' . $foto2Name;
        }

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

    public function daftar(Request $request)
    {
        // Validasi dan simpan data perusahaan
        $company = Perusahaan::create($request->all());

        // Kirim notifikasi ke admin
        $admin = User::where('role', 'admin')->first();
        if ($admin) {
            $admin->notifications()->create([
                'type' => NewCompanyRegistration::class,
                'data' => [
                    'company_id' => $company->id,
                    'company_name' => $company->name,
                ],
            ]);
        }

        return redirect()->back()->with('success', 'Pendaftaran berhasil');
    }
}