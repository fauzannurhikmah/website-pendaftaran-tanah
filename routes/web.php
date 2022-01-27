<?php

use App\Http\Controllers\{DashboardController, HomeController, SertificateController};
use Illuminate\Support\Facades\{Auth, Route};

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::middleware('auth')->group(function () {
    Route::get('/registration', [HomeController::class, 'registration'])->name('registration');
    Route::post('/registration', [HomeController::class, 'store']);
    Route::get('{sertificate}/edit', [HomeController::class, 'edit'])->name('edit-serti');
    Route::put('{sertificate}/edit', [HomeController::class, 'update']);
    Route::delete('/{sertificate}/delete', [HomeController::class, 'delete'])->name('delete-serti');
    Route::get('/announcement', [HomeController::class, 'announcement'])->name('announcement');
    Route::get('/sertificate/{sertificate}/download', [HomeController::class, 'download'])->name('download');
});
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', DashboardController::class)->name('dashboard');

    Route::prefix('sertificate')->group(function () {
        Route::get('/', [SertificateController::class, 'index'])->name('sertificate');
        Route::get('/create', [SertificateController::class, 'create'])->name('create-sertificate');
        Route::post('/create', [SertificateController::class, 'store']);
        Route::get('/{sertificate}/edit', [SertificateController::class, 'edit'])->name('edit-sertificate');
        Route::put('/{sertificate}/edit', [SertificateController::class, 'update']);
        Route::delete('/{sertificate}/delete', [SertificateController::class, 'destroy'])->name('delete-sertificate');
    });
});
