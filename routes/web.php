<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasterController;

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

Route::get('/', function () {
    return file_get_contents(__DIR__ . '../../public/index.html');
});

Route::group(['middleware' => 'admin'], function () {
    //Masters
    Route::resource('masters', MasterController::class)->only([
        'index'
    ]);

//    Route::get('/masters', [MasterController::class, 'index']);
//    Route::get('/masters/create',  [MasterController::class, 'create']);
//    Route::post('/masters',  [MasterController::class, 'store']);
//    Route::get('/masters/{master}', [MasterController::class, 'show']);
//    Route::get('/masters/{master}/edit', [MasterController::class, 'edit']);
//    Route::put('/masters/{master}', [MasterController::class, 'update']);
//    Route::delete('/masters/{master}', [MasterController::class, 'destroy']);
});


