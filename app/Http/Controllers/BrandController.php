<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //ADM
    public function indexAdmin()
    {
        $brands= Brand::orderByDesc('id')->get();
        return view('adminPages.brands.list-brand')->with(['brands' => $brands]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminPages.brands.create-brand');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'brand' => 'required|unique:brands'
        ];
        $mess = [
            'required' => 'Hãy nhập tên nhãn hàng!',
            'unique' => 'Tên nhãn hàng này đã tồn tại!'
        ];
        $request->validate($rules, $mess);
        $newBrand = new Brand();
        $newBrand->brand = $request->brand;
        $newBrand->save();
        return redirect('/admin/list-brand');
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
        $brand = Brand::find($id);
        return view('adminPages.brands.edit-brand')->with(['brand'=>$brand]);
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
        // $rules = [
        //     'brand' => 'required|unique:brands'
        // ];
        // $mess = [
        //     'required' => 'Hãy nhập tên nhãn hàng!',
        //     'unique' => 'Tên nhãn hàng này đã tồn tại!'
        // ];
        $brand = Brand::find($id);
        // $request->validate($rules, $mess);
        $brand->brand = $request->brand;
        $brand->save();
        return redirect('/admin/list-brand');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Brand::find($id)->delete();
        return back();
    }
}
