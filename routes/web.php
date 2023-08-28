<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TattooController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index']);
Route::get('/admin', [AdminController::class, 'index']);

Route::middleware(['admin', 'auth'])->prefix('admin/')->name('admin.')->group(function () {
    Route::resource('masters', MasterController::class);
    Route::resource('tattoos', TattooController::class);
    Route::resource('reviews', ReviewController::class);
    Route::resource('products', ProductController::class);
});


Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
