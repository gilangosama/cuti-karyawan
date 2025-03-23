<?php

use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\CutiApprovalController;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SetupAppController;
use App\Http\Controllers\HrdController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/calendar', [CalendarController::class, 'index']);
    Route::get('/calendar/events', [CalendarController::class, 'events']);
    Route::post('/calendar/store', [CalendarController::class, 'store']); // Tambahkan route untuk menyimpan event
    Route::put('/calendar/update/{id}', [CalendarController::class, 'update']); // Tambahkan route untuk mengedit event
    Route::delete('/calendar/destroy/{id}', [CalendarController::class, 'destroy']); // Tambahkan route untuk menghapus event
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('/setup-app', [SetupAppController::class, 'store']);
    Route::get('/setup-app', [SetupAppController::class, 'get']);

    Route::get('/cuti', [CutiController::class, 'index'])->name('cuti.index');
    Route::get('/cuti/create', [CutiController::class, 'create'])->name('cuti.create');
    Route::post('/cuti', [CutiController::class, 'store'])->name('cuti.store');
    Route::get('/cuti/{cuti}/edit', [CutiController::class, 'edit'])->name('cuti.edit');
    Route::put('/cuti/{cuti}', [CutiController::class, 'update'])->name('cuti.update');
    Route::delete('/cuti/{cuti}', [CutiController::class, 'destroy'])->name('cuti.destroy');

    Route::get('/approval', [CutiApprovalController::class, 'index'])->name('cuti.approval.index');
    Route::put('/approval/{cuti}', [CutiApprovalController::class, 'update'])->name('cuti.approval.update');
    // Route::get('/approval/detail', [CutiApprovalController::class, 'detail'])->name('cuti.approval.detail');

    Route::get('/approval/detail', function () {
        return view('cuti.approval.detail');
    })->name('cuti.approval.detail');
});

// ini punya viky
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/{id}/detail', [DashboardController::class, 'detail'])->name('dashboard.detail');

    Route::get('/hrd/index', [UserController::class, 'index'])->name('hrd.index');
    Route::get('/hrd/detail', [UserController::class, 'detail'])->name('hrd.detail');
    Route::get('/hrd/edit/{id}', [UserController::class, 'edit'])->name('hrd.edit');
    Route::put('/hrd/update/{id}', [UserController::class, 'update'])->name('hrd.update');
    Route::delete('/hrd/delete/{id}', [UserController::class, 'destroy'])->name('hrd.destroy');

    Route::get('/approval/index', [ApprovalController::class, 'index'])->name('approval.index');
    Route::get('/approval/detail', [ApprovalController::class, 'detail'])->name('approval.detail');
    Route::put('/approval/update/{id}', [ApprovalController::class, 'update'])->name('approval.update');
    Route::get('/approval/hrd', [ApprovalController::class, 'hrd'])->name('approval.hrd');
});

Route::prefix('hrd')->group(function () {
    Route::get('/create', function () {
        return view('hrd.create');
    })->name('hrd.create');

    Route::post('/store', [UserController::class, 'store'])->name('hrd.store');
});

require __DIR__ . '/auth.php';
