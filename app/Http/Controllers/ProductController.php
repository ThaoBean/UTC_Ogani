<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Brand;
use App\Category;
use App\Product;
use App\ReviewProduct;
use App\OrderDetail;
use App\UserFavorite;
use File;
use DB;
use WithPagination;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchProduct(Request $request){
        $products = [];
        if(Auth::check()){
            $user = Auth::user();
            $products = Product::where('name', 'LIKE', '%'.$request->search. '%')
            ->leftJoin(DB::raw("(SELECT user_id, product_id FROM user_favorites where user_favorites.user_id = $user->id) as tb"), 'tb.product_id', '=', 'products.id')
            ->paginate(16);
        }
        else{
            $products = Product::where('name', 'LIKE', '%'.$request->search. '%')->paginate(9);
        }
        return view('clientPages.search')->with([
            'products' => $products,
        ]);
    }

    public function getProductById($id){
        $product = "";
        $category = "";
        $brand = "";
        if(Auth::check()){
            $user = Auth::user();
            $product = DB::table('products')->where('id', $id)
            ->leftJoin(DB::raw("(SELECT user_id, product_id FROM user_favorites where user_favorites.user_id = $user->id) as tb"), 'tb.product_id', '=', 'products.id')->get();
            $product = $product[0];
        }
        else{
            $product = Product::find($id);
        }
        $category = Category::find($product->category_id);
        $brand = Brand::find($product->brand_id);
        $productRelated = Product::where('category_id', $product->category_id)->inRandomOrder()->limit(4)->get();
        $listReviewProduct = ReviewProduct::where('product_id', $id)
        ->join('users', 'users.id', '=', 'review_products.user_id')
        ->select(
            'users.name as username',
            'users.avatar as avatar',
            'review_products.quantity_star as quantity_star',
            'review_products.review as review',
        )->get();
        return view('clientPages.product-detail')->with([
            'product' => $product,
            'category' => $category,
            'brand' => $brand,
            'productRelated' => $productRelated,
            'listReviewProduct' => $listReviewProduct,
        ]);
    }

    public function getListProductByCategory($id){
        $category = Category::find($id);
        $brands = Brand::all();
        $products = Product::where('category_id', $id)->get();
        // $productsFilter = Product::where('category_id', $id)->paginate(9);
        $productsFilter_ = Product::where('category_id', $id)
            ->select(DB::raw("*, price - price * discount * 0.01 as real_discount"));
        switch(request('sortBy')){
            case 'price_asc':
                $productsFilter_->orderby('real_discount', 'asc');
                break;
            case 'price_desc':
                $productsFilter_->orderby('real_discount', 'desc');
                break;
            case 'newness':
                $productsFilter_->orderby('updated_at', 'desc');
                break;
            default:
                $productsFilter_->orderby('id', 'desc');
                break;
        }
        $productsOnSale = $products->where('discount', '>', 0);
        $productsLatest = Product::where('category_id', $id)->orderby('created_at', 'DESC')->limit(6)->get();
        $productsFilter = $productsFilter_->paginate(9);
        return view('clientPages.product_by_category')->with([
            'products' => $products,
            'productsOnSale' => $productsOnSale,
            'brands' => $brands,
            'productsFilter'=> $productsFilter,
            'category' => $category,
            'productsLatest' => $productsLatest,
        ]);
    }

    public function getListProductByBrand($id){
        $categories = Category::all();
        $brand = Brand::find($id);
        $products = Product::where('brand_id', $id)->get();
        $productsFilter_ = Product::where('brand_id', $id)
            ->select(DB::raw("*, price - price * discount * 0.01 as real_discount"));
        switch(request('sortBy')){
            case 'price_asc':
                $productsFilter_->orderby('real_discount', 'asc');
                break;
            case 'price_desc':
                $productsFilter_->orderby('real_discount', 'desc');
                break;
            case 'newness':
                $productsFilter_->orderby('updated_at', 'desc');
                break;
            default:
                $productsFilter_->orderby('id', 'desc');
                break;
        }
        $productsOnSale = $products->where('discount', '>', 0);
        $productsLatest = Product::where('brand_id', $id)->orderby('created_at', 'DESC')->limit(6)->get();
        $productsFilter = $productsFilter_->paginate(9);
        return view('clientPages.product_by_brand')->with([
            'products' => $products,
            'productsOnSale' => $productsOnSale,
            'categories' => $categories,
            'productsFilter'=> $productsFilter,
            'brand' => $brand,
            'productsLatest' => $productsLatest,
        ]);
    }

    public function indexAdmin()
    {
        $products = Product::all();
        return view('adminPages.products.list-product')->with(['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('adminPages.products.create-product')->with(['categories'=>$categories, 'brands'=>$brands]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->featured === null);
        $this->validate($request, [
            'product' => 'required',
            'description' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg|max:2048',
            'image1' => 'required|mimes:jpeg,png,jpg|max:2048',
            'image2' => 'required|mimes:jpeg,png,jpg|max:2048',
            'image3' => 'required|mimes:jpeg,png,jpg|max:2048',
            'image4' => 'required|mimes:jpeg,png,jpg|max:2048',
            'image5' => 'required|mimes:jpeg,png,jpg|max:2048',
            'brand' => 'required',
            'category' => 'required',
        ],[
            'product.required' => 'H??y nh???p t??n s???n ph???m!',
            'description.required' => 'H??y nh???p th??ng tin chi ti???t s???n ph???m!',
            'price.required' => 'H??y nh???p gi?? s???n ph???m!',
            'quantity.required' => 'H??y nh???p s??? l?????ng s???n ph???m!',
            'image.required' => 'H??y ch???n 1 ???nh',
            // 'image.image' => 'File ph???i l?? ?????nh d???ng ???nh',
            'image.mimes' => '???nh ph???i c?? ??u??i jpge, png, jpg',
            'image.max' => '???nh c?? k??ch th?????c t???i ??a 2048MB',
            'image1.required' => 'H??y ch???n 1 ???nh',
            'image1.mimes' => '???nh ph???i c?? ??u??i jpge, png, jpg',
            'image1.max' => '???nh c?? k??ch th?????c t???i ??a 2048MB',
            'image2.required' => 'H??y ch???n 1 ???nh',
            'image2.mimes' => '???nh ph???i c?? ??u??i jpge, png, jpg',
            'image2.max' => '???nh c?? k??ch th?????c t???i ??a 2048MB',
            'image3.required' => 'H??y ch???n 1 ???nh',
            'image3.mimes' => '???nh ph???i c?? ??u??i jpge, png, jpg',
            'image3.max' => '???nh c?? k??ch th?????c t???i ??a 2048MB',
            'image4.required' => 'H??y ch???n 1 ???nh',
            'image4.mimes' => '???nh ph???i c?? ??u??i jpge, png, jpg',
            'image4.max' => '???nh c?? k??ch th?????c t???i ??a 2048MB',
            'image5.required' => 'H??y ch???n 1 ???nh',
            'image5.mimes' => '???nh ph???i c?? ??u??i jpge, png, jpg',
            'image5.max' => '???nh c?? k??ch th?????c t???i ??a 2048MB',
            'brand.required' => 'H??y ch???n th????ng hi???u cho s???n ph???m',
            'category.required' => 'H??y ch???n danh m???c cho s???n ph???m',
        ]);

        $newProduct = new Product();
        $newProduct->name = $request->product;
        $newProduct->short_desc = $request->short_desc;
        $newProduct->description = $request->description;
        $newProduct->price = $request->price;
        if($request->discount === null){
            $newProduct->discount = 0;
        }
        else{
            $newProduct->discount = $request->discount;
        }
        $newProduct->quantity = $request->quantity;
        $newProduct->brand_id = $request->brand;
        $newProduct->category_id = $request->category;

        $destinationPath = public_path('/storage/images');
        $image = $request->file('image');
        $image_name = time() . '.' . $image->getClientOriginalExtension();
        $image->move($destinationPath, $image_name);
        $newProduct->image = $image_name;
        //Detail image
        $image1 = $request->file('image1');
        $image_name1 = time() . '1.' . $image1->getClientOriginalExtension();
        $image1->move($destinationPath, $image_name1);
        $imageDetail = $image_name1 . ',';

        $image2 = $request->file('image2');
        $image_name2 = time() . '2.' . $image2->getClientOriginalExtension();
        $image2->move($destinationPath, $image_name2);
        $imageDetail = $imageDetail . $image_name2 . ',';

        $image3 = $request->file('image3');
        $image_name3 = time() . '3.' . $image3->getClientOriginalExtension();
        $image3->move($destinationPath, $image_name3);
        $imageDetail = $imageDetail . $image_name3 . ',';

        $image4 = $request->file('image4');
        $image_name4 = time() . '4.' . $image4->getClientOriginalExtension();
        $image4->move($destinationPath, $image_name4);
        $imageDetail = $imageDetail . $image_name4 . ',';

        $image5 = $request->file('image5');
        $image_name5 = time() . '5.' . $image5->getClientOriginalExtension();
        $image5->move($destinationPath, $image_name5);
        $imageDetail = $imageDetail . $image_name5;

        $newProduct->imageDetail = $imageDetail;
        if($request->featured === null){
            $newProduct->featured = false;
        }
        else{
            $newProduct->featured = true;
        }
        $newProduct->save();
        return redirect('/admin/list-product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $brand = Brand::find($product->brand_id);
        $category = Category::find($product->category_id);
        return view('adminPages.products.show-product')->with([
            'product' => $product, 
            'brand' => $brand, 
            'category' => $category, 
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $product = Product::find($id);
        return view('adminPages.products.edit-product')->with([
            'product' => $product,
            'categories'=>$categories, 
            'brands'=>$brands
        ]);
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
        $product = Product::find($id);
        $product->name = $request->product;
        $product->short_desc = $request->short_desc;
        $product->description = $request->description;
        $product->price = $request->price;
        if($request->discount === null){
            $product->discount = 0;
        }
        else{
            $product->discount = $request->discount;
        }
        $product->quantity = $request->quantity;
        $product->brand_id = $request->brand;
        $product->category_id = $request->category;

        $destinationPath = public_path('/storage/images');

        if($request->hasFile('image')){
            $image_path = public_path("storage/images/".$product->image);
            if (File::exists($image_path)) {
                // File::delete($image_path);
                unlink($image_path);
            }
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $image_name);
            $product->image = $image_name;
        }
        else{
            $product->image = $product->image;
        }
        //Detail image
        $detailImageOld = $product->imageDetail;
        $arrImageDetail = explode(',', $detailImageOld);

        if($request->hasFile('image1')){
            $image_path = public_path("storage/images/".$arrImageDetail[0]);
            if (File::exists($image_path)) {
                // File::delete($image_path);
                unlink($image_path);
            }
            $image = $request->file('image1');
            $image_name = time() . '1.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $image_name);
            $arrImageDetail[0] = $image_name;
        }
        if($request->hasFile('image2')){
            $image_path = public_path("storage/images/".$arrImageDetail[1]);
            if (File::exists($image_path)) {
                // File::delete($image_path);
                unlink($image_path);
            }
            $image = $request->file('image2');
            $image_name = time() . '2.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $image_name);
            $arrImageDetail[1] = $image_name;
        }
        if($request->hasFile('image3')){
            $image_path = public_path("storage/images/".$arrImageDetail[2]);
            if (File::exists($image_path)) {
                // File::delete($image_path);
                unlink($image_path);
            }
            $image = $request->file('image3');
            $image_name = time() . '3.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $image_name);
            $arrImageDetail[2] = $image_name;
        }
        if($request->hasFile('image4')){
            $image_path = public_path("storage/images/".$arrImageDetail[3]);
            if (File::exists($image_path)) {
                // File::delete($image_path);
                unlink($image_path);
            }
            $image = $request->file('image4');
            $image_name = time() . '4.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $image_name);
            $arrImageDetail[3] = $image_name;
        }
        if($request->hasFile('image5')){
            $image_path = public_path("storage/images/".$arrImageDetail[4]);
            if (File::exists($image_path)) {
                // File::delete($image_path);
                unlink($image_path);
            }
            $image = $request->file('image5');
            $image_name = time() . '5.' . $image->getClientOriginalExtension();
            $image->move($destinationPath, $image_name);
            $arrImageDetail[4] = $image_name;
        }
        
        $newImageDetail = implode(',', $arrImageDetail);
        $product->imageDetail = $newImageDetail;
        if($request->featured === null){
            $product->featured = false;
        }
        else{
            $product->featured = true;
        }
        $product->save();
        return redirect('/admin/list-product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $image_path = public_path("storage/images/".$product->image);
        if (File::exists($image_path)) {
            unlink($image_path);
        }
        $detailImageOld = $product->imageDetail;
        $arrImageDetail = explode(',', $detailImageOld);
        $image_path1 = public_path("storage/images/".$arrImageDetail[0]);
        if (File::exists($image_path1)) {
            unlink($image_path1);
        }
        $image_path2 = public_path("storage/images/".$arrImageDetail[1]);
        if (File::exists($image_path2)) {
            unlink($image_path2);
        }
        $image_path3 = public_path("storage/images/".$arrImageDetail[2]);
        if (File::exists($image_path3)) {
            unlink($image_path3);
        }
        $image_path4 = public_path("storage/images/".$arrImageDetail[3]);
        if (File::exists($image_path4)) {
            unlink($image_path4);
        }
        $image_path5 = public_path("storage/images/".$arrImageDetail[4]);
        if (File::exists($image_path5)) {
            unlink($image_path5);
        }
        $product->delete();
        return back();
    }

    public function reviewProduct($product_id, $order_detail_id, Request $request){
        $user = Auth::user();
        $newReview = new ReviewProduct();
        $newReview->user_id = $user->id;
        $newReview->product_id = $product_id;
        $newReview->order_detail_id = $order_detail_id;
        if($request->rating == null){
            $newReview->quantity_star = 5;
        }
        else{
            $newReview->quantity_star = $request->rating;
        }
        $newReview->review = $request->review;
        $newReview->save();
        return back();
    }

    public function listSaleOff(){
        if(Auth::check()){
            $user = Auth::user();
            $products = DB::table('products')->where('discount', '>', 0)
            ->leftJoin(DB::raw("(SELECT user_id, product_id FROM user_favorites where user_favorites.user_id = $user->id) as tb"), 'tb.product_id', '=', 'products.id')
            ->paginate(16);
            return view('clientPages.sale_off')->with([
                'products' => $products,
            ]);
        }else{
            $products = Product::where('discount', '>', 0)->orderByDesc('updated_at')
            ->paginate(16);
            return view('clientPages.sale_off')->with([
                'products' => $products,
            ]);
        }
    }
}
