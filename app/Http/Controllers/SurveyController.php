<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Survey;

class SurveyQuestionController extends Controller
{
    public function create()
    {
        return view('survey.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
        ]);

        $user = auth()->user();

        Survey::create([
            'question' => $request->input('question'),
            'user_id' => $user->id,
        ]);

        return redirect()->route('survey.index')->with('success', 'Pertanyaan survei berhasil ditambahkan!');
    }
}