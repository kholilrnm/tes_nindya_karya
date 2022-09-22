<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [LoginController::class, 'index'])->name('signin');

// kurang middleware
Route::get('home', [DashboardController::class, 'index']);
Route::get('order', [OrderController::class, 'index']);
Route::get('stock', [StockController::class, 'index']);
Route::post('getBarang', [OrderController::class, 'getBarang'])->name('getBarang');
Route::post('tambahPesanan', [OrderController::class, 'tambahPesanan']);
Route::post('login', [LoginController::class, 'login']);
Route::get('register', [LoginController::class, 'register']);
Route::get('logout', [LoginController::class, 'logout']);
