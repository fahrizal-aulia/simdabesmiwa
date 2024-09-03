<?php

use App\Models\User;
use App\Models\kepulangan;
use App\Models\keberangkatan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
// use App\Http\Controllers\dashboardController;
use App\Http\Controllers\RegisterController;
// use App\Http\Controllers\PendaftarController;
use App\Http\Controllers\KepulanganController;
use App\Http\Controllers\KeberangkatanController;
use App\Http\Controllers\DashboardwargaController;
use App\Http\Controllers\DashboardKepulanganController;
use App\Http\Controllers\DashboardpendaftaranController;
use App\Http\Controllers\DashboardkeberangkatanController;
use App\Http\Controllers\forgotPasswordController;

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
Route::get('/confirmation', [RegisterController::class, 'confirmation'])->middleware('guest');
Route::get('/get-kecamatan-by-kota/{id}', [RegisterController::class, 'getKecamatanByKota']);

Route::get('/forgot-password', [forgotPasswordController::class, 'index']);
// Route::post('/forgot-password/reset', [forgotPasswordController::class, 'forgot']);
// Menampilkan form request reset password
// Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');

// Memproses pengiriman email reset password
Route::post('/forgot-password/reset', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

// Menampilkan form reset password
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');

// Memproses reset password
Route::post('reset-password', [ForgotPasswordController::class, 'reset'])->name('password.update');





// dashboard warga
Route::middleware(['auth', 'check.role:1'])->group(function () {
    Route::get('/', function () {
        $user = User::find(auth()->user()->id);
        return view('warga.dashboard', [
            'title' => 'admin',
            'user' => $user,
        ]);
    });
    // dashboard warga keberangkatan
    Route::resource('/keberangkatan', keberangkatanController::class);
    Route::resource('/kepulangan', KepulanganController::class);
    // Rute untuk menampilkan dan mengupdate profil
    Route::match(['get', 'post'], '/profile', [ProfileController::class, 'edit'])->name('profile');
    Route::get('/get-kecamatan-by-kota/{id}', [ProfileController::class, 'getKecamatanByKota']);

});


Route::middleware(['auth', 'check.role:2'])->group(function () {

    //dashboard admin
    Route::get('/dashboard', function () {
        $hitungUser = User::where('status_approve', 0)->where('id_kota', auth()->user()->id_kota)->count();
        $hitungkeberangkatan = keberangkatan::whereHas('user', function($query) {
    $query->where('id_kota', auth()->user()->id_kota);
})->count();
        $hitungkepulangan = kepulangan::whereHas('user', function($query) {
    $query->where('id_kota', auth()->user()->id_kota);
})->count();
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
    Route::resource('/dashboard/kepulangan', DashboardKepulanganController::class)->middleware('auth');

});
