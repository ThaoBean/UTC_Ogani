<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Order;
use App\Cart;
use App\OrderDetail;
use App\Product;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $myOrders = Order:: where('user_id', $user->id)->orderByDesc('created_at')->get();
        return view('clientPages.history_order')->with([
            'myOrders' => $myOrders
        ]);
    }

    public function viewOrderDetails($id){
        $statusOrder = Order::find($id);
        $myOrders = OrderDetail:: where('order_id', $id)
        ->join('products', 'products.id', '=', 'order_details.product_id')
        ->select(
            'products.id as product_id',
            'products.name as product',
            'products.image as image',
            'order_details.id as order_details_id',
            'order_details.od_quantity as unit_quantity',
            'order_details.od_discount as unit_discount',
            'order_details.od_price as unit_price',
        )->get();
        return view('clientPages.order_detail')->with([
            'myOrders' => $myOrders,
            'orderStatus' => $statusOrder->status,
        ]);
    }

    public function listOrdersAdmin() {
        $listOrders = Order::all();
        return view('adminPages.orders.list-order')->with([
            'listOrders' => $listOrders
        ]);
    }

    public function viewListOrdersDetailAdmin($id){
        $orderInfo = Order::find($id);
        $listOrdersDetail = OrderDetail:: where('order_id', $id)
        ->join('products', 'products.id', '=', 'order_details.product_id')
        ->select(
            'products.name as product',
            'products.image as image',
            'order_details.id as order_details_id',
            'order_details.od_quantity as unit_quantity',
            'order_details.od_discount as unit_discount',
            'order_details.od_price as unit_price',
        )
        ->get();
        return view('adminPages.orders.order-detail')->with([
            'listOrdersDetail' => $listOrdersDetail,
            'orderInfo' => $orderInfo,
        ]);
    }

    public function cancelOrder($id){
        $orderInfo = Order::find($id);
        $orderInfo->status = "CANCELED";
        $orderInfo->save();
        return redirect('/history-order');
    }

    public function updateStatusOrder($id, Request $request){
        $orderInfo = Order::find($id);
        // $orderInfo->user_id = $orderInfo->user_id;
        // $orderInfo->receiver = $orderInfo->receiver;
        // $orderInfo->phone_receiver = $orderInfo->phone_receiver;
        // $orderInfo->address_receiver = $orderInfo->address_receiver;
        // $orderInfo->note = $orderInfo->note;
        // $orderInfo->total_quantity = $orderInfo->total_quantity;
        // $orderInfo->total_price = $orderInfo->total_price;
        // $orderInfo->fee_shipping = $orderInfo->fee_shipping;
        // $orderInfo->payment = $orderInfo->payment;
        if($request->status == "DELIVERING"){
            $orderInfo->status = $request->status;
            $listOrders = OrderDetail:: where('order_id', $id)
            ->join('products', 'products.id', '=', 'order_details.product_id')
            ->select(
                'products.id as product_id',
                'order_details.od_quantity as od_quantity',
            )->get();
            foreach ($listOrders as $listOrder){
                $product = Product::find($listOrder->product_id);
                $product->quantity = $product->quantity - $listOrder->od_quantity;
                $product->save();
            }
        }
        $orderInfo->save();
        return redirect('/admin/list-orders');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'receiver' => 'required',
            'phone_receiver' => 'required|numeric|digits:10',
            'address_receiver' => 'required',
        ],[
            'receiver.required' => 'Hãy nhập tên người nhận hàng!',
            'phone_receiver.required' => 'Hãy nhập số điện thoại người nhận!',
            'phone_receiver.numeric' => 'Số điện thoại không hợp lệ!',
            'phone_receiver.digits' => 'Số điện thoại không hợp lệ!',
            'address_receiver.required' => 'Hãy nhập địa chỉ nhận hàng!',
        ]);

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
        $total_quantity = 0;     
        foreach ($myCart as $cart){
            $totalPrice += ($cart->price - $cart->price*$cart->discount*0.01)*$cart->quantity_cart;
            $total_quantity += $cart->quantity_cart;
        }

        $newOrder = new Order();
        $newOrder->user_id = $user->id;
        $newOrder->receiver = $request->receiver;
        $newOrder->phone_receiver = $request->phone_receiver;
        $newOrder->address_receiver = $request->address_receiver;
        $newOrder->note = $request->note;
        $newOrder->total_quantity = $total_quantity;
        $newOrder->total_price = $totalPrice;
        $newOrder->payment = 1;
        if($totalPrice > 499000){
            $newOrder->fee_shipping = 0;
        }else{
            $newOrder->fee_shipping = 30000;
        }
        $newOrder->status = "PENDING";
        $newOrder->save();

        foreach ($myCart as $cart){
            $oldProduct = Cart::find($cart->id);
            $oldProduct->delete();
        }

        foreach ($myCart as $cart){
            $newOrderDetail = new OrderDetail();
            $newOrderDetail->order_id = $newOrder->id;
            $newOrderDetail->product_id = $cart->product_id;
            $newOrderDetail->od_quantity = $cart->quantity_cart;
            $newOrderDetail->od_discount = $cart->price*$cart->discount*0.01*$cart->quantity_cart;
            $newOrderDetail->od_price = ($cart->price - $cart->price*$cart->discount*0.01)*$cart->quantity_cart;
            $newOrderDetail->save();
        }
        return redirect('/history-order');
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
