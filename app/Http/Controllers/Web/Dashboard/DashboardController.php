<?php

namespace App\Http\Controllers\Web\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function index(){
       $user = User::first();
        return view('backend.layouts.dashboard', compact('user'));
    }

   
}
