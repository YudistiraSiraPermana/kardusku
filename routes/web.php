<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\MasterDataKardusController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransaksiController;
use App\Models\MasterDataKardus;
use Illuminate\Support\Facades\Route;

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

Route::controller(AuthController::class)->group(function () {
    Route::get('/', 'index')->name('login');
    Route::post('login/proses', 'proses');
    Route::get('register', 'register');
    Route::post('register/store', 'storeRegister');
    Route::get('logout', 'logout');
});

Route::middleware(['auth'])->group(function () {
    Route::get('transaksi', [TransaksiController::class, 'index'])->name('transaksi');
    Route::get('transaksi/process/', [TransaksiController::class, 'process'])->name('transaksi.process');
    Route::get('transaksi/report', [TransaksiController::class, 'view']);
    Route::post('transaksi/report/filter', [TransaksiController::class, 'filterByDate'])->name('transaksi.filter');
    Route::post('transaksi/stock/add', [TransaksiController::class, 'addStock'])->name('transaksi.add.stock');
    Route::post('transaksi/stock/subtract', [TransaksiController::class, 'subtractStock'])->name('transaksi.add.subtract');

    Route::get('kardus', [MasterDataKardusController::class, 'index'])->name('kardus');
    Route::get('kardus/create', [MasterDataKardusController::class, 'create']);
    Route::post('kardus/store', [MasterDataKardusController::class, 'store'])->name('kardus.store');
    Route::get('kardus/edit/{id}', [MasterDataKardusController::class, 'edit']);
    Route::put('kardus/update', [MasterDataKardusController::class, 'update'])->name('kardus.update');
    Route::delete('kardus/destroy/{id}', [MasterDataKardusController::class, 'destroy']);
    Route::get('kardus/generate/{id}', [MasterDataKardusController::class, 'generate']);

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/password/update', [ChangePasswordController::class, 'update'])->name('password.update');
});
