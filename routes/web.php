<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HargaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PelangganKonfirmasiController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\TransaksiPulsaController;
use App\Http\Controllers\ContohController;
use App\Models\TransaksiPulsa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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




Auth::routes([
    'verify' => true,
    'register' => true
]);

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('transaksi-pulsa', TransaksiPulsaController::class);
Route::get('transaksi-pulsa/{action}/{id}', [TransaksiPulsaController::class, 'actiontransaksi'])->name('transaksi-pulsa.actiontransaksi');


// admin
Route::prefix('admin')->middleware(['admin'])->group(function () {
    Route::get('/', [HomeController::class, 'indexadmin'])->name('home');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::resource('stock', StockController::class);
    Route::get('/stock/{action}/{id}', [StockController::class, 'actionstock'])->name('stock.actionstock');
    Route::resource('operator', OperatorController::class);
    Route::get('operator/harga', [OperatorController::class, 'getharga'])->name('operator.getharga');
    Route::get('/operator/{action}/{id}', [OperatorController::class, 'actionoperator'])->name('operator.actionoperator');
    Route::resource('harga', HargaController::class);
    Route::get('/harga/{action}/{id}', [HargaController::class, 'actionharga'])->name('operator.actionharga');
    Route::resource('pelanggan', PelangganController::class);
    Route::post('pelanggan/{id}', [PelangganController::class, 'konfirmasi'])->name('pelanggan-konfirmasi.konfirmasi');
    Route::get('pelanggan/detail/{id}', [PelangganController::class, 'detailpelanggan'])->name('detailpelanggan.detail');
    Route::get('/pelanggan/{action}/{id}', [PelangganController::class, 'actionpelanggan'])->name('operator.actionpelanggan');
    // Route::get('/pelanggan-detail/{action}/{id}', [PelangganController::class, 'detail']);
    Route::get('pelanngan/konfirmasi', [PelangganKonfirmasiController::class, 'index'])->name('pelanggan.konfirmasi');
    Route::get('/pelanggan-konfirmasi/{action}/{id}', [PelangganKonfirmasiController::class, 'actionkonfirmasi'])->name('pelanggan.actionkonfirmasi');
    Route::delete('pelanggan/delete/{id}', [PelangganKonfirmasiController::class, 'delete'])->name('pelanggan.delete');
    Route::resource('contoh', ContohController::class);
});
