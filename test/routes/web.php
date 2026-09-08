<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompilerController;

Route::get('/', function () {
    return view('test');
});

Route::post('/compile', [CompilerController::class, 'compile']);
Route::get('/compiler', function () {
    return view('compiler');
});

