<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CalendarController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/calendar', [CalendarController::class, 'index']);
    Route::get('/calendar/events', [CalendarController::class, 'events']);
    Route::post('/calendar/store', [CalendarController::class, 'store']); // Tambahkan route untuk menyimpan event
    Route::put('/calendar/update/{id}', [CalendarController::class, 'update']); // Tambahkan route untuk mengedit event
    Route::delete('/calendar/destroy/{id}', [CalendarController::class, 'destroy']); // Tambahkan route untuk menghapus event
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
