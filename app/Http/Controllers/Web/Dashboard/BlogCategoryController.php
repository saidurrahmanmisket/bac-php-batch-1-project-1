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

    function  edit($id)
    {
        $category = category::find($id);
        if (!$category) {
            return redirect()->route('dashboard.blog.category')->with('error', 'Blog Category Not Found');
        }
        return view('backend.layouts.blog-category.edit', compact('category'));

    }

    function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|string|max:80',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $category = category::find($id);
        if (!$category) {
            return redirect()->route('dashboard.blog.category')->with('error', 'Blog Category Not Found');
        }



        if ($request->hasFile('image')) {
            $name = time().'.'.$request->file('image')->extension();

            $path = public_path('dashboard/uploads');
            $request->image->move($path, $name);
            $category->update([
                'image' =>  'dashboard/uploads/'.$name,
            ]);
        }


        $category->update([
            'name' =>$request->name,
        ]);
        $category->save();

        return redirect()->route('dashboard.blog.category')->with('success', 'Blog Category Updated Successfully');

    }


    function delete($id)
    {
        $category = category::find($id);
        if (!$category){
            return redirect()->route('dashboard.blog.category')->with('error', 'Blog Category Not Found');
        }
        $category->delete();
        return redirect()->route('dashboard.blog.category')->with('success', 'Blog Category Deleted Successfully');
    }

}
