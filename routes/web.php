<?php

use App\Http\Controllers\dashboardController;
use App\Http\Controllers\DashboardpendaftaranController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\RegisterController;
use App\Models\keberangkatan;
use App\Models\kepulangan;

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


// Route::get('/', function () {
//     return view('warga.dashboard');
// })->middleware('auth');


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


// //dashboard admin
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
// Route::get('/dashboard/pendaftar/', [dashboardController::class, 'pendaftar'])->middleware('auth');
// Route::get('/dashboard/pendaftar/{$user->id}', [DashboardpendaftaranController::class, 'show'])->middleware('auth');
// Route
Route::get('/dashboard/pendaftar/{user}', [DashboardpendaftaranController::class, 'show'])->middleware('auth');
Route::get('/dashboard/pendaftar/{user}/edit', [DashboardpendaftaranController::class, 'edit'])->middleware('auth');
Route::PUT('/dashboard/pendaftar/{user}', [DashboardpendaftaranController::class, 'update'])->name('pendaftar.update')->middleware('auth');

Route::resource('/dashboard/pendaftar', DashboardpendaftaranController::class)->middleware('auth');

