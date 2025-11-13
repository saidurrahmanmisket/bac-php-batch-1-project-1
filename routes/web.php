<?php

use App\Http\Controllers\Web\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;



Route::get('/', [DashboardController::class, 'dashboard'])->name('home');
Route::get('/home', [DashboardController::class, 'dashboard'])->name('home');
Route::get('/blog', [DashboardController::class, 'blog']);
Route::get('/login', [DashboardController::class, 'login']);
Route::get('/profile', [DashboardController::class, 'profile']);
