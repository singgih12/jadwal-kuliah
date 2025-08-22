<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\JadwalGeneratorController;





Route::get('/', function () {
    return view('welcome');
});

// Auth routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');
// Protected routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class);
    
    Route::resource('dosen', DosenController::class);
    Route::resource('kelas', KelasController::class);
    Route::resource('mata_kuliah', MataKuliahController::class);

    Route::get('/jadwal/generate', [JadwalGeneratorController::class, 'generate'])->name('jadwal.generate');

    Route::get('/export-pdf/{hari}', [JadwalController::class, 'exportPdf'])->name('jadwal.exportPdf');
    Route::get('/jadwal/{id}/cetak', [JadwalController::class, 'cetak'])->name('jadwal.cetak');
    Route::get('/jadwal/{id}/edit', [JadwalController::class, 'edit'])->name('jadwal.edit');
    Route::put('/jadwal/{id}', [JadwalController::class, 'update'])->name('jadwal.update');
    Route::delete('/jadwal/{id}', [JadwalController::class, 'destroy'])->name('jadwal.destroy'); // <== ini yang sebelumnya rusak
    Route::resource('jadwal', JadwalController::class);
});



// Route::get('/jadwal/generate', [JadwalGeneratorController::class, 'generate'])
//     ->name('jadwal.generate');






