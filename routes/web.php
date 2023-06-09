<?php

use App\Http\Controllers\CetakPdf;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VerifikasiController;
use App\Models\mahasiswa;
use GuzzleHttp\Middleware;
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

// Route::get('/', function () {
//     return view('dashboard');
// })->middleware('auth');
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware('auth');
// Route::get('/tables', [MahasiswaController::class, 'index'])->middleware('auth');



Route::get(
    '/formmahasiswa',
    function () {
        return view('formmahasiswa');
    }
)->middleware('auth');

Route::redirect('/', 'login');


Route::get('/login', [LoginController::class, 'login'])->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

// Route::get('login', function () {
//     return view('login');
// });
Route::get('dashboard/mahasiswa', [DashboardController::class, 'data'])->middleware('auth');
Route::resource('dashboard', DashboardController::class)->middleware('auth');
Route::resource('mahasiswa', MahasiswaController::class)->middleware('auth')->parameters(['mahasiswa' => 'mahasiswa']);
Route::resource('user', UserController::class)->middleware('admin');
