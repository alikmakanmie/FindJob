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
use App\Http\Controllers\CategoryController;

// Crud dasar
Route::middleware(['auth'])->group(function () {
    Route::get('penggunas', [PenggunaController::class, 'index'])->name('penggunas.index');
    Route::get('penggunas/create', [PenggunaController::class, 'create'])->name('penggunas.create');
    Route::post('penggunas', [PenggunaController::class, 'store'])->name('penggunas.store');
    Route::get('penggunas/{pengguna}', [PenggunaController::class, 'show'])->name('penggunas.show');
    Route::get('penggunas/{pengguna}/edit', [PenggunaController::class, 'edit'])->name('penggunas.edit');
    Route::put('penggunas/{pengguna}', [PenggunaController::class, 'update'])->name('penggunas.update');
    Route::delete('penggunas/{pengguna}', [PenggunaController::class, 'destroy'])->name('penggunas.destroy');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/perusahaan', [PerusahaanController::class, 'index'])->name('perusahaan.index');
    Route::get('/perusahaan/create', [PerusahaanController::class, 'create'])->name('perusahaan.create');
    Route::post('/perusahaan/store', [PerusahaanController::class, 'store'])->name('perusahaan.store');
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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// ... rute yang sudah ada ...
Route::controller(FrontendController::class)->group(function () {
    Route::get('/tampilkan-perusahaan/{id}', 'tampilkanperusahaan')->name('tampilkanperusahaan');
    Route::get('/tampilkan-semua', 'perusahaan')->name('tampilkansemua');
    Route::get('/userprofile', 'index')->name('userprofile');
    Route::post('/komentar', 'storeComment')->name('komentar.store');
    Route::delete('/komentar/{id}', 'deleteComment')->name('komentar.destroy');
    Route::get('/test',  'test')->name('test');
});

// Rute untuk notifikasi
Route::controller(NotificationController::class)->group(function () {
    Route::get('/notifications', 'index')->name('notifications.index');
    Route::get('/notifications/{id}', 'show')->name('notifications.show');
    Route::post('/notifications/{id}/mark-as-read', 'markAsRead')->name('notifications.markAsRead');
});

// Rute untuk kategori
Route::controller(CategoryController::class)->group(function () {
    Route::get('/categories', 'index')->name('categories.index');
    Route::get('/categories/create', 'create')->name('categories.create');
    Route::post('/categories', 'store')->name('categories.store');
});


// Rute untuk upgrade role
Route::middleware(['auth', 'admin'])->controller(AdminController::class)->group(function () {
    Route::get('/admin/permintaan', 'Permintaan')->name('admin.permintaan');
    Route::put('/admin/upgrade-role/{user}', 'upgradeRole')->name('admin.upgradeRole');
    Route::put('/admin/downgrade-role/{user}', 'downgradeRole')->name('admin.downgradeRole');
    Route::put('/admin/approve/{user}', 'approve')->name('admin.approve');
    Route::put('/admin/reject/{user}', 'reject')->name('admin.reject');
    Route::get('/admin/view-survey/{user}', 'viewSurvey')->name('admin.viewSurvey');
});


// Rute untuk permintaan upgrade role
Route::post('/user/update-profile', [UserController::class, 'updateProfile'])->name('user.updateProfile');
Route::get('/admin/akun', [AdminController::class, 'index'])->name('admin.akun');
Route::get('/kebijakandanprivasi', [KebijakanDanPrivasiController::class, 'index'])->name('kebijakan.privasi');
Route::get('/daftar/perusahaan', [AdminController::class, 'daftarPerusahaan'])->name('daftar.perusahaan');
Route::post('/daftar/permintaan', [AdminController::class, 'storePermintaan'])->name('admin.storePermintaan');
Route::get('/daftar/survey', [AdminController::class, 'survey'])->name('daftar.survey');
Route::post('/daftar/survey', [AdminController::class, 'storeSurvey'])->name('daftar.storeSurvey');