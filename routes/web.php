<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HistoryController;

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


Auth::routes();
Route::prefix('admin')->middleware('auth', 'admin')->group(function (){
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::get('data/log', [LogController::class, 'index'])->name('log');
    Route::get('data/export/excel', [AdminController::class, 'export']);
    Route::resource('drivers', DriverController::class);
    Route::resource('vehicles', VehicleController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('histories', HistoryController::class);
});

