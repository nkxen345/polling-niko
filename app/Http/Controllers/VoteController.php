<?php

namespace App\Http\Controllers;

use App\Models\PollOption;
use Illuminate\Http\Request;

class VoteController extends Controller
{
    public function store(PollOption $option)
    {
        $option->increment('votes');

        return redirect()->route('polls.index')->with('success', 'Vote berhasil!');
    }
}
