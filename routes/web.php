<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\JadwalController;
use App\Http\Controllers\TipeController;
use App\Http\Controllers\SewaController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\AuthController;
// use App\Http\Controllers\PembayaranController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('/login', [AuthController::class, 'showFormLogin'])->name('login');
// Route::get('/login', [AuthController::class, 'login'])->name('log');




Route::get('/transaction', [TransactionController::class, 'api'])->name('transaction');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/halamanSewa', [HomeController::class, 'tipe'])->name('tipe');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/jadwal/perform', [HomeController::class, 'jadwalperform'])->name('jadwalperform');



//cust
Route::get('/', [HomeController::class, 'index'])->name('home');
route::group(['middleware' =>['auth','ceklevel:customer']], function () {
Route::get('/user/sewa/{id}', [HomeController::class, 'sewa'])->name('user.sewa');
 
Route::get('/pesanan', [PesananController::class, 'index'])->name('pesanan.index');
Route::get('/pesanann/{id}', [PesananController::class, 'pesanan'])->name('pesanann.index');

Route::post('/home/create', [HomeController::class, 'store'])->name('home.store');
Route::post('/home/pembayaran', [HomeController::class, 'bayarstore'])->name('pembayaran.store');
// Route::get('/home/bayar', [HomeController::class, 'bayar'])->name('home.bayar');
Route::get('/home/bayar/{pesanan}', [HomeController::class, 'bayar'])->name('user.bayar');
Route::get('/tiketku', [HomeController::class, 'tiketku'])->name('tiketku');
Route::get('/tiketku/pdf/{id}', [HomeController::class, 'pdf'])->name('pdf');
});

//admin

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth','ceklevel:admin'])->name('dashboard');
Route::group(['middleware' =>['auth','ceklevel:admin']], function () {
    Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal.index')->middleware(['auth']);
    Route::put('/jadwal/update/{id}', [JadwalController::class, 'update'])->name('jadwal.update');
    Route::get('/jadwal/edit/{id}', [JadwalController::class, 'edit'])->name('jadwal.edit');
    Route::delete('/jadwal/delete/{id}', [JadwalController::class, 'destroy'])->name('jadwal.delete');
    Route::post('/jadwal/index', [JadwalController::class, 'store'])->name('jadwal.store');
    // Route::post('/jadwal', [HomeController::class, 'sewa'])->name('sewa.store');
    Route::get('/jadwal/create', [JadwalController::class, 'create'])->name('jadwal.create');


    Route::get('/tipe/index', [TipeController::class, 'index'])->name('tipe.index')->middleware(['auth']);
    Route::put('/tipe/update/{id}', [TipeController::class, 'update'])->name('tipe.update');
    Route::get('/tipe/edit/{id}', [TipeController::class, 'edit'])->name('tipe.edit');
    Route::delete('/tipe/delete/{id}', [TipeController::class, 'destroy'])->name('tipe.delete');
    Route::post('/tipe/index', [TipeController::class, 'store'])->name('tipe.store');
    Route::get('/tipe/create', [TipeController::class, 'create'])->name('tipe.create');
    
   

    // Route::post('/transaction', [TransactionController::class, 'store']);
    // Route::put('/transaction/{id}', [TransactionController::class, 'update']);
    // Route::get('/transaction/{id}', [TransactionController::class, 'show']);
    // Route::delete('/transaction/{id}', [TransactionController::class, 'destroy']);
});
Route::get('/pembayaran/sewa', [PembayaranController::class, 'index'])->name('pembayaran.index')->middleware(['auth']);
Route::delete('/pembayaran/delete/{id}', [PembayaranController::class, 'destroy'])->name('pembayaran.delete');
Route::get('/pembayaran/{id}', [PembayaranController::class, 'konfirmasi'])->name('konfirmasi');
require __DIR__ . '/auth.php';
