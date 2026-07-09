<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TechnicianController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login'])->name('login.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::middleware('admin')->group(function () {

    Route::get('/dashboard',[DashboardController::class, 'index'])->name('dashboard');

    Route::resource('teknisi', TechnicianController::class);

    Route::resource('pelanggan', CustomerController::class)->parameters([
        'pelanggan' => 'customer'
    ]);

    Route::resource('servis', ServiceController::class)
        ->parameters([
            'servis' => 'servis'
        ]);


    Route::resource('pembayaran', PaymentController::class);

    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
});
