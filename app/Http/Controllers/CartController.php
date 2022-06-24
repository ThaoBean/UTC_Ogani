<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use DB;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updateCart(Request $request){
        if(count($request['idCart']) > 0){
            foreach($request['idCart'] as $key => $value){
                $infoCart = Cart::find($key);
                $inventory = Product::find($infoCart->product_id);
                if($inventory->quantity < $value || $value <=0){
                    return back()->with(
                        ['error' => 'The number of products '. $inventory->name .' is invalid']
                    );
                }
                else{
                    $infoCart->quantity_cart = $value;
                    $infoCart->save();
                }
            }
            return redirect('/my-cart')->with(
                ['success' => 'Update cart successfully']
            );
        }
    }

    public function index()
    {
        $user = Auth::user();
        $myCart = Cart::where('user_id', $user->id)
        ->join('products', 'products.id', '=', 'carts.product_id')
        ->orderByDesc('carts.updated_at')
        ->select(
            'carts.id as id',
            'carts.user_id as user_id',
            'carts.product_id as product_id',
            'carts.quantity_cart as quantity_cart',
            'carts.created_at as created_at',
            'carts.updated_at as updated_at',
            'products.discount as discount',
            'products.price as price',
            'products.image as image',
            'products.name as name',
            'products.quantity as quantity',
        )->get();  
        $totalPrice = 0;     
        foreach ($myCart as $cart){
            $totalPrice += ($cart->price - $cart->price*$cart->discount*0.01)*$cart->quantity_cart;
        }
        if ($totalPrice > 499000)
            $total = $totalPrice;
        else
            $total = $totalPrice + 30000;
        return view("clientPages.cart")->with([
            'myCart' => $myCart,
            'totalPrice'=>$totalPrice,
            'total' => $total
        ]);
    }

    public function checkout(){
        $user = Auth::user();
        $myCart = Cart::where('user_id', $user->id)
        ->join('products', 'products.id', '=', 'carts.product_id')
        ->orderByDesc('carts.updated_at')
        ->select(
            'carts.id as id',
            'carts.user_id as user_id',
            'carts.product_id as product_id',
            'carts.quantity_cart as quantity_cart',
            'carts.created_at as created_at',
            'carts.updated_at as updated_at',
            'products.discount as discount',
            'products.price as price',
            'products.image as image',
            'products.name as name',
        )->get();  
        $totalPrice = 0;
        $total = 0;     
        foreach ($myCart as $cart){
            $totalPrice += ($cart->price - $cart->price*$cart->discount*0.01)*$cart->quantity_cart;
        }
        if ($totalPrice > 499000)
            $total = $totalPrice;
        else
            $total = $totalPrice + 30000;
        return view("clientPages.checkout")->with([
            'myCart' => $myCart,
            'totalPrice'=>$totalPrice,
            'total' => $total, 
            'receiver' => $user->name,
            'phone_number' => $user->phone_number,
            'address' => $user->address,
        ]);
    }

    public function continueShopping(){
        return redirect('/');
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
        $oldProduct = Cart::where('product_id', $id)->where('user_id', $user->id)->get();
        if(count($oldProduct)>0){
            $oldProduct[0]->quantity_cart = $oldProduct[0]->quantity_cart + 1;
            $oldProduct[0]->user_id = $oldProduct[0]->user_id;
            $oldProduct[0]->product_id = $oldProduct[0]->product_id;
            $oldProduct[0]->save();
        }
        else{
            $newCart = new Cart();
            $newCart->user_id = $user->id;
            $newCart->product_id = $id;
            $newCart->quantity_cart = 1;
            $newCart->save();
        }
        return redirect('/my-cart');
    }

    public function addToCart($id, Request $request){
        $this->validate($request, [
            'quantity_cart' => 'required|min:1',
        ],[
            'quantity_cart.required' => 'Hãy nhập số lượng sản phẩm!',
            'quantity_cart.min' => 'Số lượng sản phẩm không được nhỏ hơn 1!',
        ]);
        $user = Auth::user();
        $oldProduct = Cart::where('product_id', $id)->where('user_id', $user->id)->get();
        if(count($oldProduct)>0){
            $oldProduct[0]->quantity_cart = $oldProduct[0]->quantity_cart + $request->quantity_cart;
            $oldProduct[0]->user_id = $oldProduct[0]->user_id;
            $oldProduct[0]->product_id = $oldProduct[0]->product_id;
            $oldProduct[0]->save();
        }
        else{
            $newCart = new Cart();
            $newCart->user_id = $user->id;
            $newCart->product_id = $id;
            $newCart->quantity_cart = $request->quantity_cart;
            $newCart->save();
        }
        return redirect('/my-cart');
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
        $oldProduct = Cart::find($id);
        $oldProduct->delete();
        return back();
    }
}
