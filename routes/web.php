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
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\Auth\VerificationController;

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
    Route::get('/perusahaan/{perusahaan}/createQuestion', [PerusahaanController::class, 'createQuestion'])->name('perusahaan.createQuestion');
    Route::post('/perusahaan/{perusahaan}/storeQuestion', [PerusahaanController::class, 'storeQuestion'])->name('perusahaan.storeQuestion');
    Route::get('/perusahaan/{perusahaan}/editQuestion', [PerusahaanController::class, 'editQuestion'])->name('perusahaan.editQuestion');
    Route::put('/perusahaan/{perusahaan}/updateQuestion', [PerusahaanController::class, 'updateQuestion'])->name('perusahaan.updateQuestion');
    Route::get('/perusahaan/show-question/{perusahaan_id}', [PerusahaanController::class, 'showQuestion'])->name('perusahaan.showQuestion');
    Route::post('/perusahaan/{perusahaan}/storeAnswer', [PerusahaanController::class, 'storeAnswer'])->name('perusahaan.storeAnswer');
    Route::post('/perusahaan/store-answer', [PerusahaanController::class, 'storeAnswer'])->name('perusahaan.storeAnswer');
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
    Route::get('/perusahaan/kategori/{id}', 'perusahaankategori')->name('perusahaankategori');
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
Route::post('/user/update-foto', [UserController::class, 'updateFoto'])->name('user.updateFoto');
Route::get('/admin/akun', [AdminController::class, 'index'])->name('admin.akun');
Route::get('/kebijakandanprivasi', [KebijakanDanPrivasiController::class, 'index'])->name('kebijakan.privasi');
Route::get('/daftar/perusahaan', [AdminController::class, 'daftarPerusahaan'])->name('daftar.perusahaan');
Route::post('/daftar/permintaan', [AdminController::class, 'storePermintaan'])->name('admin.storePermintaan');
Route::get('/daftar/survey', [AdminController::class, 'survey'])->name('daftar.survey');
Route::post('/daftar/survey', [AdminController::class, 'storeSurvey'])->name('daftar.storeSurvey');
// Route::get('/answer/show-question/{id}', [AnswerController::class, 'showQuestion'])->name('answer.showQuestion');
// Route::post('/perusahaan/{id}/storeAnswer', [AnswerController::class, 'storeAnswer'])->name('perusahaan.storeAnswer');

// Rute untuk logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Rute untuk pengiriman kode verifikasi dan verifikasi kode
Route::post('/send-verification-code', 'Auth\VerificationController@sendVerificationCode')->name('send.verification.code');
Route::post('/verify-code', 'Auth\VerificationController@verifyCode')->name('verify.code');
Route::get('/verification-code', [VerificationController::class, 'showVerificationForm'])->name('verification.code');

// Rute untuk verifikasi email
use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::get('/email/verify', function () {
    return view('auth.verification-pending');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])
    ->middleware(['auth', 'signed'])->name('verification.verify');

// Tambahkan rute baru untuk halaman sukses verifikasi
Route::get('/email/verify/success', [VerificationController::class, 'showSuccess'])
    ->middleware('auth')->name('verification.success');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();
    return back()->with('message', 'Link verifikasi telah dikirim!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::get('/home', function () {
    // ...
})->middleware(['auth', 'verified']);

Route::get('/profile', function () {
    return view('Frontend.LayOut.Halaman.userprofile');
})->middleware(['auth', 'verified'])->name('profile');

Route::middleware(['auth', 'check.userprofile'])->group(function () {
    // Semua route yang memerlukan profil lengkap
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // ... route lainnya ...
});

// // Route untuk userprofile tidak perlu menggunakan middleware check.userprofile
// Route::get('/userprofile', [UserProfileController::class, 'index'])->name('userprofile');
// Route::post('/userprofile/update', [UserProfileController::class, 'update'])->name('user.updateProfile');