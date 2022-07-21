<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', [App\Http\Controllers\Main\IndexController::class, 'index'])->name('index');
Route::group(['namespace' => 'App\Http\Controllers\Main'], function () {
    Route::get('/', \IndexController::class)->name('index');
});

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
