<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use App\Models\PollOption;
use Illuminate\Http\Request;

class PollController extends Controller
{
    public function index()
    {
        $polls = Poll::with('options')->latest()->get();
        return view('polls.index', compact('polls'));
    }

    public function create()
    {
        return view('polls.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'status' => 'required|boolean',
            'options' => 'required|array|min:2',
            'options.*' => 'required|string|max:255',
        ]);

        $poll = Poll::create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'user_id' => auth()->id(),
        ]);

        // Simpan opsi yang dibuat user
        $optionsData = array_map(fn($opt) => ['option_text' => $opt, 'votes' => 0], $request->options);
        $poll->options()->createMany($optionsData);

        return redirect()->route('polls.index')->with('success', 'Polling berhasil dibuat');
    }

    public function show(Poll $poll)
    {
        $poll->load('options'); // pastikan options ter-load
        return view('polls.show', compact('poll'));
    }

    public function edit(Poll $poll)
    {
        return view('polls.edit', compact('poll'));
    }

    public function update(Request $request, Poll $poll)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'status' => 'required|boolean',
        ]);

        $poll->update($request->only('title', 'description', 'status'));

        return redirect()->route('polls.index')->with('success', 'Polling berhasil diperbarui');
    }

    public function destroy(Poll $poll)
    {
        $poll->delete();
        return redirect()->route('polls.index')->with('success', 'Polling berhasil dihapus');
    }

    public function vote(Request $request, Poll $poll)
    {
        $request->validate([
            'option_id' => 'required|exists:poll_options,id',
        ]);

        $option = $poll->options()->findOrFail($request->option_id);
        $option->increment('votes');

        return redirect()->route('polls.show', $poll)->with('success', 'Vote berhasil!');
    }
}
