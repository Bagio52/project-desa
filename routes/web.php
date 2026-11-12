<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;

Route::get('/', [DashboardController::class, 'index'])->name('home');

Route::get('/admin/login', [App\Http\Controllers\AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [App\Http\Controllers\AdminAuthController::class, 'login'])->name('admin.login.submit');

// Halaman dashboard admin (harus login)
Route::get('/admin/dashboard', function () {
    $totalBerita = \App\Models\Berita::count();
    $totalGalery = \App\Models\Galery::count();
    $recentBerita = \App\Models\Berita::latest()->take(5)->get();
    $recentGalery = \App\Models\Galery::latest()->take(6)->get();
    return view('admin.dashboard', compact('totalBerita', 'totalGalery', 'recentBerita', 'recentGalery'));
})->middleware('auth:admin')->name('admin.dashboard');

Route::post('/logout', [App\Http\Controllers\AdminAuthController::class, 'logout'])->name('admin.logout');

Route::get('admin/berita', [AdminController::class, 'index'])->name('admin.berita.index');
Route::get('admin/berita/create', [AdminController::class, 'create'])->name('admin.berita.create');
Route::post('admin/berita', [AdminController::class, 'store'])->name('admin.berita.store');
Route::get('admin/berita/{id}/edit', [AdminController::class, 'edit'])->name('admin.berita.edit');
Route::put('admin/berita/{id}', [AdminController::class, 'update'])->name('admin.berita.update');
Route::delete('admin/berita/{id}', [AdminController::class, 'destroy'])->name('admin.berita.destroy');

Route::get('admin/galery', [AdminController::class, 'galeryIndex'])->name('admin.galery.index');
Route::get('admin/galery/create', [AdminController::class, 'galeryCreate'])->name('admin.galery.create');
Route::post('admin/galery', [AdminController::class, 'galeryStore'])->name('admin.galery.store');
Route::get('admin/galery/{id}/edit', [AdminController::class, 'galeryEdit'])->name('admin.galery.edit');
Route::put('admin/galery/{id}', [AdminController::class, 'galeryUpdate'])->name('admin.galery.update');
Route::delete('admin/galery/{id}', [AdminController::class, 'galeryDestroy'])->name('admin.galery.destroy');

// // Logout
// Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/about', [App\Http\Controllers\DashboardController::class, 'about'])->name('about');
Route::get('/berita/{id}', [DashboardController::class, 'beritaDetail'])->name('berita.show');
