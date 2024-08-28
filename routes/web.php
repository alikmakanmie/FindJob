<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggunaController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\KebijakanDanPrivasiController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\HomeController;

// Crud dasar
Route::resource('penggunas', PenggunaController::class);
Route::middleware(['auth'])->group(function () {
    Route::get('/perusahaan', [PerusahaanController::class, 'index'])->name('perusahaan.index');
    Route::get('/perusahaan/create', [PerusahaanController::class, 'create'])->name('perusahaan.create');
    Route::post('/perusahaan', [PerusahaanController::class, 'store'])->name('perusahaan.store');
    Route::get('/perusahaan/{perusahaan}', [PerusahaanController::class, 'show'])->name('perusahaan.show');
    Route::get('/perusahaan/{perusahaan}/edit', [PerusahaanController::class, 'edit'])->name('perusahaan.edit');
    Route::put('/perusahaan/{perusahaan}', [PerusahaanController::class, 'update'])->name('perusahaan.update');
    Route::delete('/perusahaan/{perusahaan}', [PerusahaanController::class, 'destroy'])->name('perusahaan.destroy');
});

// login
Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
});

// View
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/tampilkan-perusahaan/{id}', [FrontendController::class, 'tampilkanperusahaan'])->name('tampilkanperusahaan');
Route::get('/tampilkan-semua', [FrontendController::class, 'perusahaan'])->name('tampilkansemua');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/userprofile', [App\Http\Controllers\FrontendController::class, 'index'])->name('userprofile');

// ... rute yang sudah ada ...

Route::post('/user/update-profile', [UserController::class, 'updateProfile'])->name('user.updateProfile');
Route::get('/admin/store', [PerusahaanController::class, 'index'])->name('admin.store');
Route::get('/admin/akun', [AdminController::class, 'index'])->name('admin.akun');
Route::post('/perusahaan/daftar', [PerusahaanController::class, 'daftar'])->name('perusahaan.daftar');
Route::get('/kebijakandanprivasi', [KebijakanDanPrivasiController::class, 'index'])->name('kebijakan.privasi');
Route::get('/daftar/perusahaan', [KebijakanDanPrivasiController::class, 'daftarPerusahaan'])->name('daftar.perusahaan');
Route::get('/admin/akun', [AdminController::class, 'index'])->name('admin.akun');
// Rute untuk permintaan upgrade role

// Rute untuk notifikasi
Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
Route::get('/notifications/{id}', [NotificationController::class, 'show'])->name('notifications.show');
Route::post('/notifications/{id}/mark-as-read', [NotificationController::class, 'markAsRead'])->name('notifications.markAsRead');

// Rute untuk upgrade role

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/permintaan', [AdminController::class, 'viewPermintaan'])->name('admin.permintaan');
    Route::put('/admin/upgrade-role/{user}', [AdminController::class, 'upgradeRole'])->name('admin.upgradeRole');
    Route::put('/admin/downgrade-role/{user}', [AdminController::class, 'downgradeRole'])->name('admin.downgradeRole');
});

