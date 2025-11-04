<?php

use App\Http\Controllers\Web\Dashboard\DashboardController;
use Illuminate\Support\Facades\Route;



Route::get('/', [DashboardController::class, 'dashboard']);
