<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ParticipantController;

Route::get('/', function () {
    return view('adminlte');
});



// Participant Routes
Route::get('/first', [ParticipantController::class, 'index'])->name('participants.index');
Route::get('/first/create', [ParticipantController::class, 'create'])->name('participants.create');
Route::post('/first', [ParticipantController::class, 'store'])->name('participants.store');
Route::get('/first/{participant}/edit', [ParticipantController::class, 'edit'])->name('participants.edit');
Route::put('/first/{participant}', [ParticipantController::class, 'update'])->name('participants.update');
Route::delete('/first/{participant}', [ParticipantController::class, 'destroy'])->name('participants.destroy');

