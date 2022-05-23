<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\UserFavorite;
use App\Product;

class UserFavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $listProductFavorite = UserFavorite::where('user_id', $user->id)
        ->join('products', 'products.id', '=', 'user_favorites.product_id')
        ->orderByDesc('user_favorites.created_at')
        ->select(
            'products.id as id',
            'products.name as name',
            'products.price as price',
            'products.discount as discount',
            'products.image as image',
        )
        ->get();
        return view('clientPages.my_favorite_product')->with([
            'listProductFavorite' =>  $listProductFavorite,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        $user = Auth::user();
        $existProduct = UserFavorite::where('user_id', '=', $user->id)->where('product_id', '=', $id)->get();
        if(count($existProduct) > 0){
            $existProduct[0]->delete();
            return back()->with(
                ['success' => 'The product removed from wishlist successfully.']
            );
        }
        else{
            $newObj = new UserFavorite();
            $newObj->user_id = $user->id;
            $newObj->product_id = $id;
            $newObj->save();
            return back()->with(
                ['success' => 'Add to favorite successfully.']
            );
        }
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
