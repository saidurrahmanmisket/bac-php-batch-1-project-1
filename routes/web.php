<?php

use App\Http\Controllers\ProfileController;
use App\Models\Task;
use Illuminate\Support\Facades\Route;



Route::get('/dashboard', function () {
    $user = auth()->user();
    return view('backend.layouts.dashboard', compact('user'));
})->middleware(['auth', 'verified', 'admin'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', function () {
   
    return view('frontend.app');
})->name('home');

require __DIR__.'/auth.php';
