<?php

namespace App\Http\Controllers\Web\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogCategoryController extends Controller
{
     function index(){
        return view('backend.layouts.blog-category.blog-category');
    }


    function create() {
        // dd(auth()->user() );
        return view('backend.layouts.blog-category.create');
    }

    function store(Request $request){
        dd($request->all());
    }

}
