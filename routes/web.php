<?php

use App\Http\Controllers\AntrianController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

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
    return view('home');
});

Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'create']);


Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'otentikasi'])->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/antrian', [AntrianController::class, 'index'])->middleware('auth');
Route::get('/antrian/{id}', [AntrianController::class, 'show'])->middleware('auth');
Route::get('/antrian-add', [AntrianController::class, 'create'])->middleware('auth');
Route::get('/antrian-edit/{id}', [AntrianController::class, 'edit'])->middleware('auth');
Route::post('/antrian', [AntrianController::class, 'store'])->middleware('auth');
Route::put('/antrian/{id}', [AntrianController::class, 'update'])->middleware('auth');
Route::get('/antrian-delete/{id}', [AntrianController::class, 'delete'])->middleware('auth');
Route::delete('/antrian-destroy/{id}', [AntrianController::class, 'destroy'])->middleware('auth');

Route::get('/panduan-aplikasi', [HomeController::class, 'panduan']);
Route::get('/tanyakan', [HomeController::class, 'tanyakan']);

Route::get('/status/{id}', [AntrianController::class, 'statuspangpeg'])->middleware('auth');
Route::get('/selesai/{id}', [AntrianController::class, 'statuspangdok'])->middleware('auth');
