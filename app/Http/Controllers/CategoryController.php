<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categories;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = categories::all();
        return view('admin.create', compact('categories'));
    }

    public function create()
    {
        return view('perusahaan.createcategories');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255|unique:categories,name',
        ]);
        
        $category = new categories([
            'name' => $request->nama_kategori,
        ]);

        $category->save();
        
        return redirect()->route('categories.index')->with('success', 'Kategori berhasil ditambahkan');
    }
}
