<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perusahaan;
use App\Models\Comment;


class FrontendController extends Controller
{
  
    public function index()
    {
        return view('Frontend.LayOut.Halaman.userprofile');
    }

    public function perusahaan()
    {
        $perusahaan = Perusahaan::all();  // Angka 12 bisa disesuaikan
        return view('Frontend.LayOut.Halaman.perusahaan', compact('perusahaan'));
    }
    
    public function tampilkanperusahaan($id)
    {
        $perusahaan = Perusahaan::findOrFail($id);
        $comments = Comment::where('commentable_id', $id)
                           ->where('commentable_type', Perusahaan::class)
                           ->with('user')
                           ->latest()
                           ->get();
        return view('Frontend.LayOut.Halaman.lihatdetail', compact('perusahaan', 'comments'));
    }

    public function storeComment(Request $request)
    {
        $request->validate([
            'perusahaan_id' => 'required|exists:perusahaan,id',
            'content' => 'required|string|max:1000',
        ]);

        Comment::create([
            'user_id' => auth()->id(),
            'commentable_id' => $request->perusahaan_id,
            'commentable_type' => Perusahaan::class,
            'content' => $request->content,
        ]);

        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan.');
    }

    public function deleteComment($id)
    {
        $comment = Comment::findOrFail($id);
        
        if (auth()->id() === $comment->user_id || auth()->user()->role === 'admin') {
            $comment->delete();
            return redirect()->back()->with('success', 'Komentar berhasil dihapus.');
        }

        return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk menghapus komentar ini.');
    }

}
