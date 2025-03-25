<?php

use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\CutiApprovalController;
use App\Http\Controllers\SetupAppController;
use App\Http\Controllers\HrdController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfilController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
})->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/{id}/detail', [DashboardController::class, 'detail'])->name('dashboard.detail');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::patch('/profil/{id}', [ProfilController::class, 'update'])->name('profil.update');

    Route::prefix('calendar')->group(function () {
        Route::get('/', [CalendarController::class, 'index']);
        Route::get('/events', [CalendarController::class, 'events']);
        Route::post('/store', [CalendarController::class, 'store']);
        Route::put('/update/{id}', [CalendarController::class, 'update']);
        Route::delete('/destroy/{id}', [CalendarController::class, 'destroy']);
    });

    Route::prefix('cuti')->group(function () {
        Route::get('/', [CutiController::class, 'index'])->name('cuti.index');
        Route::get('/create', [CutiController::class, 'create'])->name('cuti.create');
        Route::post('/', [CutiController::class, 'store'])->name('cuti.store');
        Route::get('/{cuti}', [CutiController::class, 'show'])->name('cuti.show');
        Route::get('/{cuti}/edit', [CutiController::class, 'edit'])->name('cuti.edit');
        Route::put('/{cuti}', [CutiController::class, 'update'])->name('cuti.update');
        Route::delete('/{cuti}', [CutiController::class, 'destroy'])->name('cuti.destroy');
        Route::get('/{cuti}/export-surat', [CutiController::class, 'exportSurat'])->name('cuti.export-surat');
        Route::get('/export-selected', [CutiController::class, 'exportSelected'])->name('cuti.export-selected');
        Route::get('/export-all', [CutiController::class, 'exportAll'])->name('cuti.export-all');
    });

    Route::prefix('approval')->group(function () {
        Route::get('/', [CutiApprovalController::class, 'index'])->name('cuti.approval.index');
        Route::put('/{cuti}', [CutiApprovalController::class, 'update'])->name('cuti.approval.update');
        Route::get('/detail/{id}', [CutiApprovalController::class, 'detail'])->name('cuti.approval.detail');
        Route::put('/approve/{id}', [CutiApprovalController::class, 'approved'])->name('cuti.approval.approve');
        Route::put('/reject/{id}', [CutiApprovalController::class, 'reject'])->name('cuti.approval.reject');
        Route::get('/hrd', [CutiApprovalController::class, 'hrd'])->name('approval.hrd');
        Route::get('/hrd', [UserController::class, 'index'])->name('hrd.index');
    });

    Route::prefix('hrd')->group(function () {
        Route::get('/index', [UserController::class, 'index'])->name('hrd.index');
        Route::get('/detail', [UserController::class, 'detail'])->name('hrd.detail');
        Route::get('/create', [UserController::class, 'create'])->name('hrd.create');
        Route::post('/store', [UserController::class, 'store'])->name('hrd.store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('hrd.edit');
        Route::put('/update/{id}', [UserController::class, 'update'])->name('hrd.update');
        Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('hrd.destroy');
    
    });

    Route::prefix('setup-app')->group(function () {
        Route::post('/', [SetupAppController::class, 'store']);
        Route::get('/', [SetupAppController::class, 'get']);
    });
});

require __DIR__ . '/auth.php';
