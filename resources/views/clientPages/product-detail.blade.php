@extends('clientPages.master')
@section('cssCustomInput')
    <link rel="stylesheet" href="{{asset('css/custom.css')}}" type="text/css">
@endsection
@section('content')
@include("clientPages.brand_")
<!-- Product Details Section Begin -->
<section class="product-details spad">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-6">
        <div class="product__details__pic">
          <div class="product__details__pic__item">
            <img style="width:555px; height: 555px;" class="product__details__pic__item--large"
              src="{{URL::to('storage/images/'.$product->image)}}" alt="">
          </div>
          @php
          $images = "$product->imageDetail";
          $arrImg = explode(",", $images);              
          @endphp
          <div class="product__details__pic__slider owl-carousel">
            @foreach($arrImg as $img)
            <img style="width:124px; height: 124px;" data-imgbigurl="{{URL::to('storage/images/'.$img)}}"
              src="{{URL::to('storage/images/'.$img)}}" alt="">
            @endforeach  
          </div>
        </div>
      </div>
      <div class="col-lg-6 col-md-6">
        <div class="product__details__text">
          <h3>{{$product->name}}</h3>
          <div class="product__details__rating">
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-half-o"></i>
            <span>(18 reviews)</span>
          </div>
          <div class="product__details__price">{{number_format($product->price - $product->discount*0.1, 0)}}đ</div>
          <p>{{$product->short_desc}}</p>
          @if($product->quantity > 0)
          <form method="post" action="{{URL::to('/addToCart/'.$product->id)}}" style="display:inline-flex;">
            <div class="product__details__quantity">
                <div class="quantity">
                    <div class="pro-qty">
                        <input type="number" name="quantity_cart" min="1" max="{{$product->quantity}}" oninput="validity.valid||(value='1')"  value="1">
                    </div>
                </div>
            </div>
            <button type="submit" style="border: none; background-color: transparent;">
                <a class="primary-btn">Thêm vào giỏ hàng</a>
            </button>
            @csrf
          </form>
          @else
          <a href="#" class="primary-btn">Hết hàng</a>
          @endif
          <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
          @error('quantity_cart')
            <div class="text-danger" >{{ $message }}</div>
        @enderror
          <ul>
            <li><b>Thương hiệu</b> <span>{{$brand->brand}}</span></li>
            <li><b>Danh mục</b> <span>{{$category->category}}</span></li>
            <li><b>Trạng thái</b> <span>@if($product->quantity > 0) Còn hàng @else Hết hàng @endif</span></li>
            <li>
              <b>Share on</b>
              <div class="share">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-pinterest"></i></a>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-lg-12">
        <div class="product__details__tab">
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                aria-selected="true">Chi tiết sản phẩm</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                aria-selected="false">Đánh giá</a>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tabs-1" role="tabpanel">
              <div class="product__details__tab__desc detail_desc">
                <h6>Thông tin chi tiết sản phẩm {{$product->name}}</h6>
                <p>{!!$product->description!!}</p>
              </div>
            </div>
            <div class="tab-pane" id="tabs-2" role="tabpanel">
              <div class="product__details__tab__desc">
                <h6>Products Infomation</h6>
                <p>Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                  Pellentesque in ipsum id orci porta dapibus. Proin eget tortor risus.
                  Vivamus suscipit tortor eget felis porttitor volutpat. Vestibulum ac diam
                  sit amet quam vehicula elementum sed sit amet dui. Donec rutrum congue leo
                  eget malesuada. Vivamus suscipit tortor eget felis porttitor volutpat.
                  Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Praesent
                  sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac
                  diam sit amet quam vehicula elementum sed sit amet dui. Vestibulum ante
                  ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                  Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula.
                  Proin eget tortor risus.
                </p>
                <p>Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Lorem
                  ipsum dolor sit amet, consectetur adipiscing elit. Mauris blandit aliquet
                  elit, eget tincidunt nibh pulvinar a. Cras ultricies ligula sed magna dictum
                  porta. Cras ultricies ligula sed magna dictum porta. Sed porttitor lectus
                  nibh. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Product Details Section End -->
<!-- Related Product Section Begin -->
<section class="related-product">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="section-title related__product__title">
          <h2>Sản phẩm tương tự</h2>
        </div>
      </div>
    </div>
    <div class="row">
      @foreach($productRelated as $item)
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="product__item">
          <div class="product__item__pic set-bg" data-setbg="{{URL::to('storage/images/'.$item->image)}}">
            <ul class="product__item__pic__hover">
              <li><a href="#"><i class="fa fa-heart"></i></a></li>
              <li><a href="#"><i class="fa fa-retweet"></i></a></li>
              <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
            </ul>
          </div>
          <div class="product__item__text">
            <h6><a href="{{URL::to('/detail-product/'.$item->id)}}">{{$item->name}}</a></h6>
            <h5>{{number_format($product->price - $product->discount*0.1, 0)}}đ</h5>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
<!-- Related Product Section End -->
@endsection