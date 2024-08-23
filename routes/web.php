<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggunaController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PerusahaanController;



// Crud dasar
Route::resource('penggunas', PenggunaController::class);
Route::resource('perusahaan', PerusahaanController::class);

// login
Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
});

// View
Route::get('/', function () {
    return view('Frontend.LayOut.Halaman.index');
})->name('index');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/userprofile', [App\Http\Controllers\FrontendController::class, 'userProfile'])->name('userprofile');

// ... rute yang sudah ada ...

Route::get('/user/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');



Route::post('/user/update-profile', [UserController::class, 'updateProfile'])->name('user.updateProfile');
Route::get('/admin/store', [PerusahaanController::class, 'index'])->name('admin.store');

Route::get('/admin/akun', [AdminController::class, 'index'])->name('admin.akun');