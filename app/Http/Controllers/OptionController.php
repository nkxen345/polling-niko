<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Option;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    public function create(Question $question)
    {
        return view('options.create', compact('question'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'question_id' => 'required',
            'options' => 'required|array'
        ]);

        foreach ($request->options as $opt) {
            if ($opt !== null && trim($opt) !== "") {
                Option::create([
                    'question_id' => $request->question_id,
                    'option_text' => $opt,
                    'votes' => 0,
                ]);
            }
        }

        return redirect()->route('polls.index')->with('success', 'Pertanyaan dan opsi berhasil dibuat!');
    }
}
