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
        $categories = categories::all();
        return view('perusahaan.createcategories', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        categories::create($request->all());

        return redirect()->route('admin.create')->with('success', 'Kategori berhasil dibuat.');
    }
}
