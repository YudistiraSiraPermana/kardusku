<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MasterDataKardusController;
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
    Route::get('logout', 'logout');
});

Route::get('transaksi', [TransaksiController::class, 'index']);
Route::get('transaksi/report', [TransaksiController::class, 'view']);

Route::get('kardus', [MasterDataKardusController::class, 'index']);
Route::get('kardus/create', [MasterDataKardusController::class, 'create']);
Route::get('kardus/edit', [MasterDataKardusController::class, 'edit']);
