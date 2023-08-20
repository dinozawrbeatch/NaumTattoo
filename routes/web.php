<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TattooController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//
//Route::get('/', function () {
//    return view('front.index');
//});

Route::middleware('admin')->name('admin.')->group(function () {
    Route::resource('masters', MasterController::class);
    Route::resource('tattoos', TattooController::class);
    Route::resource('reviews', ReviewController::class);
    Route::resource('products', ProductController::class);
});


