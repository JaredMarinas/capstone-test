<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompilerController;

Route::get('/', function () {
    return view('test');
});

Route::get('/compiler', [CompilerController::class, 'index']);
Route::post('/run-code', [CompilerController::class, 'run']);

Route::get('/compiler', function () {
    return view('compiler');
});

