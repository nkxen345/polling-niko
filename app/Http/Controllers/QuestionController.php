<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    // FORM TAMBAH PERTANYAAN
    public function create(Poll $poll)
    {
        return view('questions.create', compact('poll'));
    }

    // SIMPAN PERTANYAAN
    public function store(Request $request)
    {
        Question::create([
            'poll_id' => $request->poll_id,
            'text'    => $request->question_text
        ]);

        return redirect()->route('polls.show', $request->poll_id)
                         ->with('success', 'Pertanyaan berhasil ditambahkan!');
    }
}
