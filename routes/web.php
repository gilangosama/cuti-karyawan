<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
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

    Route::get('/cuti/approval', function () {
        return view('cuti.approval.index');
    })->name('cuti.approval.index');

    Route::get('/cuti/approval/{id}', function ($id) {
        return view('cuti.approval.detail', ['id' => $id]);
    })->name('cuti.approval.detail');
});

Route::get('/profile', function () {
    return view('profile.index');
})->middleware(['auth'])->name('profile');

Route::get('/hrd', function () {
    return view('hrd.index');
})->name('hrd.index');

require __DIR__.'/auth.php';
