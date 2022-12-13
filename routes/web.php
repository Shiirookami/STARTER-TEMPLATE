<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('home', function() {
    return view('home');
})->name('home')->middleware('auth');

Auth::routes();

Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/home', [AdminController::class, 'index'])->name('admin.home')
->middleware('is_admin');
