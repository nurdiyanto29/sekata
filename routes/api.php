<?php

use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ApiJadwalController;
use App\Http\Controllers\ApiUserController;
use App\Http\Controllers\ApiTipeController;
use App\Http\Controllers\ApiPembayaranController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::get('/user', [ApiUserController::class, 'index'])->name('user');
Route::resource('/user', ApiUserController::class);
Route::resource('/tipe', ApiTipeController::class)->except(['create','edit']);
Route::resource('/jadwal', ApiJadwalController::class)->except(['create','edit']);
Route::resource('/pembayaran', ApiPembayaranController::class)->except(['create','edit']);

