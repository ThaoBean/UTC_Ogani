<?php

namespace App\Providers;
use App\Brand;
use App\Category;
use App\Product;
use App\Cart;
use App\UserFavorite;
use App\OrderDetail;
use DB;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('clientPages.brand', function($view){
            $brands = Brand::all();
            $view->with('brands', $brands);
        });
        view()->composer('clientPages.categories', function($view){
            $categories = Category::all();
            $view->with('categories', $categories);
        });
        view()->composer('clientPages.products.featuredProduct', function($view){
            $products=[];
            if(Auth::check()){
                $user = Auth::user();
                $products = DB::table('products')->where('featured', true)->inRandomOrder()->limit(8)
                ->leftJoin(DB::raw("(SELECT user_id, product_id FROM user_favorites where user_favorites.user_id = $user->id) as tb"), 'tb.product_id', '=', 'products.id')
                ->get();
            }
            else{
                $products = Product::where('featured', true)->inRandomOrder()->limit(8)->get();
            }
            $categories = Category::all()->take(6);
            $view->with(['categories' => $categories, 'products' => $products]);
        });
        view()->composer('clientPages.brand_', function($view){
            $brands = Brand::all();
            $view->with('brands', $brands);
        });
        view()->composer('clientPages.header', function($view){
            $totalOrder = 0;
            $totalPrice = 0;
            $totalFavorite = 0;
            if(Auth::check()){
                $user = Auth::user();
                $myCart = Cart::where('user_id', $user->id)->join('products', 'products.id', '=', 'carts.product_id')->get();
                $listProductFavorite = UserFavorite::where('user_id', $user->id)->get();
                $totalOrder = count($myCart);
                $totalFavorite = count($listProductFavorite);
                foreach ($myCart as $cart){
                    $totalPrice += ($cart->price - $cart->price*$cart->discount*0.01)*$cart->quantity_cart;
                }
            }            
            $view->with([
                'totalOrder' => $totalOrder,
                'totalPrice' => $totalPrice,
                'totalFavorite' => $totalFavorite,
            ]);
        });
        view()->composer('clientPages.home', function($view){
            $productsLatest = Product::orderByDesc('updated_at')->limit(6)->get();
            $productsSale = Product::orderByDesc('discount')->limit(6)->get();
            $topProducts = DB::table('order_details')
                ->join('products', 'products.id', 'product_id')
                ->select(DB::raw('products.*, count(products.id) as total'))
                ->groupBy('products.id')
                ->orderByDesc('total')
                ->limit(6)
                ->get();
            $view->with([
                'productsLatest' => $productsLatest,
                'productsSale' => $productsSale,
                'topProducts' => $topProducts,
            ]);
        });
    }
}
