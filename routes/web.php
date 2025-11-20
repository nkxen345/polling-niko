<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PollController;
use App\Http\Controllers\VoteController;
use Illuminate\Support\Facades\Auth;

// ❗ Setiap buka root, logout dulu lalu ke login
Route::get('/', function () {
    Auth::logout(); // Logout user jika masih login
    return redirect()->route('login'); // arahkan ke login
});

// Middleware auth
Route::middleware(['auth'])->group(function () {

    // DASHBOARD
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | POLL ROUTES (CRUD)
    |--------------------------------------------------------------------------
    */

    // LIST & CREATE
    Route::get('/polls', [PollController::class, 'index'])->name('polls.index');
    Route::get('/polls/create', [PollController::class, 'create'])->name('polls.create');
    Route::post('/polls', [PollController::class, 'store'])->name('polls.store');

    // EDIT (harus di atas show)
    Route::get('/polls/{poll}/edit', [PollController::class, 'edit'])->name('polls.edit');
    Route::put('/polls/{poll}', [PollController::class, 'update'])->name('polls.update');

    // DELETE
    Route::delete('/polls/{poll}', [PollController::class, 'destroy'])->name('polls.destroy');

    // SHOW (paling bawah!)
    Route::get('/polls/{poll}', [PollController::class, 'show'])->name('polls.show');

    /*
    |--------------------------------------------------------------------------
    | VOTING
    |--------------------------------------------------------------------------
    */
    Route::post('/vote/{option}', [VoteController::class, 'vote'])->name('vote.submit');
    Route::post('/polls/{poll}/vote', [PollController::class, 'vote'])->name('polls.vote');
});

require __DIR__.'/auth.php';
