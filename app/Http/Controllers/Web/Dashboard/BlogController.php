<?php

namespace App\Http\Controllers\Web\Dashboard;

use App\DataTables\BlogDataTable;
use App\Http\Controllers\Controller;
use App\Models\blog;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller
{
    function index(BlogDataTable $dataTable){
        return $dataTable->render('backend.layouts.blog.blog');
    }


    function create() {
        $category = category::all();

        return view('backend.layouts.blog.create', compact('category'));
    }

    function store(Request $request){
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|integer|exists:categories,id',
            'sub_title' => 'required|string|max:255',
            'description' => 'required|string|max:2000',
            'sub_description' => 'required|string|max:2000',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {

            $image = uploadImage($request->file('image'), 'blog');
            $thumbnail = uploadImage($request->file('thumbnail'), 'thumbnail');

            $data = blog::create([
                'title' => $request->title,
                'category_id' => $request->category,
                'sub_title' => $request->sub_title,
                'description' => $request->description,
                'sub_description' => $request->sub_description,
                'image' => $image,
                'thumbnail' => $thumbnail,
            ]);
            $data->save();

            return redirect()->route('dashboard.blog')->with('success', 'Blog Created Successfully');
        }catch (\Exception $e){
            return redirect()->back()->with('error', $e->getMessage());

        }
    }

    function  edit($id)
    {
        $blog = blog::find($id);
        $blog->load('category');
        $category = category::all();
        if (!$blog) {
            return redirect()->route('dashboard.blog.')->with('error', 'Blog  Not Found');
        }
        return view('backend.layouts.blog.edit', compact('blog', 'category'));

    }

    function update(Request $request,$id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|integer|exists:categories,id',
            'sub_title' => 'required|string|max:255',
            'description' => 'required|string|max:2000',
            'sub_description' => 'required|string|max:2000',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'thumbnail' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $image = uploadImage($request->file('image'), 'blog');
            $blog->update([
                'image' => $image
            ]);
        }
        if ($request->hasFile('thumbnail')) {
            $thumbnail = uploadImage($request->file('thumbnail'), 'thumbnail');
            $blog->update([
                'thumbnail' => $thumbnail
            ]);
        }

        $blog->update([
            'title' => $request->title,
            'category_id' => $request->category,
            'sub_title' => $request->sub_title,
            'description' => $request->description,
            'sub_description' => $request->sub_description,
        ]);
        $blog->save();


        return redirect()->route('dashboard.blog')->with('success', 'Blog  Updated Successfully');

    }


    function delete($id)
    {
        $blog = blog::find($id);
        if (!$blog){
            return redirect()->route('dashboard.blog')->with('error', 'Blog  Not Found');
        }
        $blog->delete();
        return redirect()->route('dashboard.blog')->with('success', 'Blog  Deleted Successfully');
    }

}
