<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perusahaan;
use App\Notifications\NewCompanyRegistration;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PerusahaanController extends Controller
{
    /**
     * Menampilkan daftar perusahaan.
     */
    public function index()
    {
        $user = Auth::user();
        $perusahaan = Perusahaan::latest()->paginate(12);
        $userid = Perusahaan::where('user_id', $user->id)->get();
        
        if ($user->role === 'admin') {
            $allPerusahaan = Perusahaan::all();
            return view('admin.store', compact('perusahaan', 'userid', 'allPerusahaan'));
        }
        
        return view('admin.store', compact('perusahaan', 'userid'));
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

        try {
            $foto = null;
            $foto1 = null;
            $foto2 = null;

            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $name = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('images/perusahaan'), $name);
                $foto = 'images/perusahaan/' . $name;
            }

            if ($request->hasFile('foto1')) {
                $file1 = $request->file('foto1');
                $name1 = time() . '_' . $file1->getClientOriginalName();
                $file1->move(public_path('images/perusahaan'), $name1);
                $foto1 = 'images/perusahaan/' . $name1;
            }

            if ($request->hasFile('foto2')) {
                $file2 = $request->file('foto2');
                $name2 = time() . '_' . $file2->getClientOriginalName();
                $file2->move(public_path('images/perusahaan'), $name2);
                $foto2 = 'images/perusahaan/' . $name2;
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengunggah file: ' . $e->getMessage());
        }

        $perusahaan = new Perusahaan([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'email' => $request->email,
            'deskripsi' => $request->deskripsi,
            'deskripsi1' => $request->deskripsi1,
            'deskripsi2' => $request->deskripsi2,
            'deskripsi3' => $request->deskripsi3,  
            'foto' => $foto,
            'foto1' => $foto1,
            'foto2' => $foto2,
        ]);

        $perusahaan->save();
        $user = Auth::user();
        return redirect()->route('perusahaan.index')->with('success', 'Perusahaan berhasil ditambahkan.');
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
            $foto->storeAs('public/images', $fotoName);
            $data['foto'] = 'storage/images/' . $fotoName;
        }

        if ($request->hasFile('foto1')) {
            $foto1 = $request->file('foto1');
            $foto1Name = time() . '_' . $foto1->getClientOriginalName();
            $foto1->storeAs('public/images', $foto1Name);
            $data['foto1'] = 'storage/images/' . $foto1Name;
        }

        if ($request->hasFile('foto2')) {
            $foto2 = $request->file('foto2');
            $foto2Name = time() . '_' . $foto2->getClientOriginalName();
            $foto2->storeAs('public/images', $foto2Name);
            $data['foto2'] = 'storage/images/' . $foto2Name;
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
        // // Hapus foto dari storage jika ada
        // if ($perusahaan->foto && Storage::exists('images/perusahaan' . basename($perusahaan->foto))) {
        //     Storage::delete('' . basename($perusahaan->foto));
        // }
        
        // // Hapus foto1 dari storage jika ada
        // if ($perusahaan->foto1 && Storage::exists('images/perusahaan' . basename($perusahaan->foto1))) {
        //     Storage::delete('' . basename($perusahaan->foto1));
        // }
        
        // // Hapus foto2 dari storage jika ada  
        // if ($perusahaan->foto2 && Storage::exists('images/perusahaan' . basename($perusahaan->foto2))) {
        //     Storage::delete('' . basename($perusahaan->foto2));
        // }
        return redirect()->route('perusahaan.index')
            ->with('success', 'Perusahaan berhasil dihapus.');
    }

   
    public function detail($id)
    {
        $perusahaan = Perusahaan::findOrFail($id);
        return view('perusahaan.detail', compact('perusahaan'));
    }

    
}