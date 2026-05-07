<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AdminController;

// Public Routes
Route::get('/', [PublicController::class, 'home'])->name('home');
Route::get('/report', [PublicController::class, 'createReport'])->name('report.create');
Route::post('/report', [PublicController::class, 'storeReport'])->name('report.store');
Route::get('/track', [PublicController::class, 'trackReport'])->name('track.index');
Route::post('/track', [PublicController::class, 'checkReport'])->name('track.check');

// Admin Auth Routes
Route::get('/login', [AdminController::class, 'showLogin'])->name('login');
Route::post('/login', [AdminController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

// Protected Admin Routes
Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::post('/category', [AdminController::class, 'storeCategory'])->name('admin.category.store');
    Route::post('/article', [AdminController::class, 'storeArticle'])->name('admin.article.store');
    Route::post('/response/{report_id}', [AdminController::class, 'storeResponse'])->name('admin.response.store');
});
