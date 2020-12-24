<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\GamesController::class, 'index'])->name('games.index');
Route::get('/games/{slug}', [App\Http\Controllers\GamesController::class, 'show'])->name('games.show');
