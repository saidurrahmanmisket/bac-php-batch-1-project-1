<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\Dashboard\TaskController;
use App\Models\Task;
use Illuminate\Support\Facades\Route;

Route::get('/',[TaskController::class, 'index'])->name('home');
Route::get('/task/add',[TaskController::class, 'create'])->name('task.add');
Route::post('/task/store',[TaskController::class, 'store'])->name('task.submit');
Route::delete('/task/delete/{id}',[TaskController::class, 'destroy'])->name('task.delete');
Route::post('/task/toggle/{id}',[TaskController::class, 'toggle'])->name('task.toggle');



Route::get('/api',[TaskController::class, 'api'])->name('home');



Route::get('/dashboard', function () {
    $user = auth()->user();
    return view('backend.layouts.dashboard', compact('user'));
})->middleware(['auth', 'verified', 'admin'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
