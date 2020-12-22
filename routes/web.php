<?php

use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('index');
//});
//
//Route::get('/show', function () {
//    return view('show');
//});

Route::get('/', [App\Http\Controllers\GamesController::class, 'index'])->name('games.index');
