<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Image;
use File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function indexAdmin()
    {
        $categories= Category::orderByDesc('id')->get();
        return view('adminPages.categories.list-category')->with(['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminPages.categories.create-category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category' => 'required|unique:categories',
            'image' => 'required|mimes:jpeg,png,jpg|max:2048'
        ],[
            'category.required' => 'Hãy nhập tên danh mục!',
            'category.unique' => 'Tên danh mục này đã tồn tại!',
            'image.required' => 'Hãy chọn 1 ảnh',
            // 'image.image' => 'File phải là định dạng ảnh',
            'image.mimes' => 'Ảnh phải có đuôi jpge, png, jpg',
            'image.max' => 'Ảnh có kích thước tối đa 2048MB'
        ]);
        // $rules = [
        //     'category' => 'required|unique:categories',
        //     'image' => 'required|image|mines:jpeg,png,jpg|max:2048'
        // ];
        // $mess = [
        //     'category.required' => 'Hãy nhập tên danh mục!',
        //     'category.unique' => 'Tên danh mục này đã tồn tại!',
        //     'image.required' => 'Hãy chọn 1 ảnh',
        //     'image.mines' => 'Ảnh phải có đuôi jpge, png, jpg',
        //     'image.max' => 'Ảnh có kích thước tối đa 2048MB'
        // ];
        // $request->validate($rules, $mess);
        $newCategory = new Category();
        $newCategory->category = $request->category;
        $image = $request->file('image');
        $image_name = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/storage/images');
        $image->move($destinationPath, $image_name);
        $newCategory->image = $image_name;
        $newCategory->save();
        return redirect('/admin/list-category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('adminPages.categories.edit-category')->with(['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        if ($request->hasFile('image')){
            $image_path = public_path("storage/images/".$category->image);
            if (File::exists($image_path)) {
                // File::delete($image_path);
                unlink($image_path);
            }
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/images');
            $image->move($destinationPath, $image_name);
            $category->image = $image_name;
        } else {
            $image = $category->image;
        }
        $category->category = $request->category;
        $category->save();
        return redirect('/admin/list-category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $image_path = public_path("storage/images/".$category->image);
        unlink($image_path);
        $category->delete();
        return back();
    }
}
