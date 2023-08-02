<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SuppliersController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SuratJalanController;
use App\Http\Controllers\PenerimaanController;
use App\Http\Controllers\ReturController;
use App\Http\Controllers\LaporanController;

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

Route::get('/', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/home', [DashboardController::class, 'index'])->middleware('auth');

Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'index')->name('login');
    Route::post('login.proses', 'proses');
    Route::get('logout', 'logout');
});

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['CekUserLogin:admin']], function () {
        Route::resource('/users', UsersController::class)->except(['create']);
        Route::resource('/petugas', PetugasController::class);
        Route::resource('/suppliers', SuppliersController::class);
        Route::resource('/barang', BarangController::class);
    });

    Route::group(['middleware' => ['CekUserLogin:warehouse']], function () {
        Route::resource('/suratjalan', SuratJalanController::class);
        Route::post('/suratjalan/getdata', [SuratJalanController::class, 'getData'])->name('suratjalan.getdata');
        Route::resource('/retur', ReturController::class);
        Route::get('/report', [LaporanController::class, 'index'])->name('report.index');
        Route::get('/report/generate', [LaporanController::class, 'generateReport'])->name('report.generate');
        Route::resource('/penerimaan', PenerimaanController::class);

    });

    Route::group(['middleware' => ['CekUserLogin:direktur']], function () {
        Route::get('/reportbarang', [LaporanController::class, 'index'])->name('report.index');
        Route::get('/report/generate', [LaporanController::class, 'generateReport'])->name('report.generate');
       
    });
});
