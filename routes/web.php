<?php

use App\Models\User;
use App\Models\kepulangan;
use App\Models\keberangkatan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
// use App\Http\Controllers\dashboardController;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\DashboardwargaController;
use App\Http\Controllers\DashboardpendaftaranController;
use App\Http\Controllers\DashboardkeberangkatanController;
use App\Http\Controllers\KeberangkatanController;

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




// login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/get-kecamatan-by-kota/{id}', [RegisterController::class, 'getKecamatanByKota']);



// dashboard warga
Route::get('/', function () {
    return view('warga.dashboard');
})->middleware('auth');

// dashboard warga keberangkatan





//dashboard admin
Route::get('/dashboard', function () {
    $hitungUser = User::where('status_approve', 0)->count();
    $hitungkeberangkatan = keberangkatan::count();
    $hitungkepulangan = kepulangan::count();
    return view('admin.dashboard', [
        'title' => 'admin',
        'hitung_user' => $hitungUser,
        'hitung_keberangkatan' => $hitungkeberangkatan,
        'hitung_kepulangan' => $hitungkepulangan,
    ]);
})->middleware('auth');

// dashboard admin pendaftar
Route::get('/dashboard/pendaftar/{user}', [DashboardpendaftaranController::class, 'show'])->middleware('auth');
Route::get('/dashboard/pendaftar/{user}/edit', [DashboardpendaftaranController::class, 'edit'])->middleware('auth');
Route::PUT('/dashboard/pendaftar/{user}', [DashboardpendaftaranController::class, 'update'])->name('pendaftar.update')->middleware('auth');
Route::resource('/dashboard/pendaftar', DashboardpendaftaranController::class)->middleware('auth');
Route::delete('/dashboard/pendaftar/{user}', [DashboardpendaftaranController::class, 'destroy'])->middleware('auth');

// dashboard admin warga
Route::resource('/dashboard/warga', DashboardwargaController::class)->parameters(['warga' => 'user'])->middleware('auth');
Route::resource('/dashboard/keberangkatan', DashboardkeberangkatanController::class)->middleware('auth');

