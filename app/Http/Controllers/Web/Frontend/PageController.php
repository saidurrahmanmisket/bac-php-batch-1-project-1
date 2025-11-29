<?php

namespace App\Http\Controllers\Web\Frontend;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;

class PageController extends Controller
{
    function home()
    {
        $categorys = category::all();
        return view('frontend.layouts.home', compact('categorys'));

    }
}
