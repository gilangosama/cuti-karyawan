<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\CutiApprovalController;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\SetupAppController;
use App\Http\Controllers\HrdController;
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
    Route::get('/approval/detail', [CutiApprovalController::class, 'detail'])->name('cuti.approval.detail');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/cuti', function () {
        return view('cuti.index');
    })->name('cuti.index');

    Route::get('/cuti/create', function () {
        return view('cuti.create');
    })->name('cuti.create');
});

    Route::get('/profile', function () {
        return view('profile.index');
    })->name('profile');

Route::get('/hrd', function () {
    return view('hrd.index');
})->name('hrd.index');

Route::prefix('hrd')->group(function () {
    Route::get('/create', function () {
        return view('hrd.create');
    })->name('hrd.create');

    Route::get('/edit/{id}', function ($id) {
        return view('hrd.edit');
    })->name('hrd.edit');
});

require __DIR__ . '/auth.php';
