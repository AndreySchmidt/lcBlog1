<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', [App\Http\Controllers\Main\IndexController::class, 'index'])->name('index');
Route::group(['namespace' => 'App\Http\Controllers\Main'], function () {
    Route::get('/', \IndexController::class)->name('index');
});

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin'], function () {
    Route::group(['namespace' => 'Main'], function () {
        Route::get('/', \IndexController::class)->name('admin.main.index');
    });
    Route::group(['namespace' => 'Category', 'prefix' => 'categories'], function () {
        Route::get('/', \IndexController::class)->name('admin.category.index');
        Route::get('/create', \CreateController::class)->name('admin.category.create');
    });
});


Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
