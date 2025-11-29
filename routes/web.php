<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Web\Dashboard\BlogCategoryController;
use App\Http\Controllers\Web\Dashboard\BlogController;
use App\Http\Controllers\Web\Dashboard\DashboardController;
use App\Http\Controllers\Web\Frontend\PageController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth', 'verified', 'admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/blog', [BlogController::class, 'index'])->name('dashboard.blog');

    // blog category
    Route::get('/dashboard/blog-category', [BlogCategoryController::class, 'index'])->name('dashboard.blog.category');
    Route::get('/dashboard/blog-category/create', [BlogCategoryController::class, 'create'])->name('dashboard.blog.category.create');
    Route::post('/dashboard/blog-category', [BlogCategoryController::class, 'store'])->name('dashboard.blog.category.store');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [PageController::class, 'home'])->name('home');

require __DIR__ . '/auth.php';
