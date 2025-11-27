<?php

namespace App\Http\Controllers\Web\Dashboard;

use App\DataTables\CategoryDataTable;
use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogCategoryController extends Controller
{
     function index(CategoryDataTable $dataTable){
        return $dataTable->render('backend.layouts.blog-category.blog-category');
    }


    function create() {
        // dd(auth()->user() );


        return view('backend.layouts.blog-category.create');
    }

    function store(Request $request){
       $request->validate([
          'name' => 'required|unique:categories,name|string|max:80',
          'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
       ]);

        try {

            $name = time().'.'.$request->file('image')->extension();

            $path = public_path('dashboard/uploads');
            $request->image->move($path, $name);
            $data = category::create([
                'name' =>$request->name,
                'image' =>  'dashboard/uploads/'.$name,
            ]);

            $data->save();
            return redirect()->route('dashboard.blog.category')->with('success', 'Blog Category Created Successfully');
        }catch (\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());

        }
    }

}
