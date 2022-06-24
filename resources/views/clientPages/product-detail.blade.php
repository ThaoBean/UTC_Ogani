@extends('clientPages.master')
@section('cssCustomInput')
    <link rel="stylesheet" href="{{asset('css/custom.css')}}" type="text/css">
@endsection
@section('content')
@include("clientPages.brand_")
@if($success = Session::get('success'))
<div class="fixed-bottom">
  <div class="col-lg-3 col-md-12">
    <div class="alert alert-success alert-dismissible fade show">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Success! </strong> {{$success}}
    </div>
  </div>
</div>
@endif
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
            <!-- <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star"></i>
            <i class="fa fa-star-half-o"></i> -->
            <span>({{count($listReviewProduct)}} reviews)</span>
          </div>
          @if($product->discount > 0)
            <div style="color: red; text-decoration: line-through; font-size: 16px;";>{{number_format(($product->price), 0)}}đ</div>
          @endif  
          <div class="product__details__price">{{number_format(($product->price - $product->price*$product->discount*0.01), 0)}}đ</div>
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
                <a class="primary-btn">Add to cart</a>
            </button>
            @csrf
          </form>
          @else
          <a href="#" class="primary-btn">Out of stock</a>
          @endif
          <a href="{{URL::to('/add-to-favorite/'.$product->id)}}" class="heart-icon"><span class="icon_heart_alt" @if($product->user_id != null) style="color:red;" @endif></span></a>
          @error('quantity_cart')
            <div class="text-danger" >{{ $message }}</div>
        @enderror
          <ul>
            <li><b>Brand</b> <span>{{$brand->brand}}</span></li>
            <li><b>Category</b> <span>{{$category->category}}</span></li>
            <li><b>Status</b> <span>@if($product->quantity > 0) Available @else Out of stock @endif</span></li>
            <!-- <li>
              <b>Share on</b>
              <div class="share">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-pinterest"></i></a>
              </div>
            </li> -->
          </ul>
        </div>
      </div>
      <div class="col-lg-12">
        <div class="product__details__tab">
          <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                aria-selected="true">Detail Product</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                aria-selected="false">Reviews</a>
            </li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tabs-1" role="tabpanel">
              <div class="product__details__tab__desc detail_desc">
                <h6>Detail product: {{$product->name}}</h6>
                <p>{!!$product->description!!}</p>
              </div>
            </div>
            <div class="tab-pane" id="tabs-2" role="tabpanel">
                <div class="product__details__tab__desc">
                    <h6>Products Review</h6>
                    @if(count($listReviewProduct) > 0)
                      @foreach( $listReviewProduct as $reviewProduct)
                      <div class="review_item">
                          <div class="media">
                              <div class="d-flex">
                                  <img style="width: 50px; height: 50px; border-radius: 50%;" src="{{URL::to('storage/images/'.$reviewProduct->avatar)}}" alt="">
                              </div>
                              <div class="media-body">
                                  <h4>{{$reviewProduct->username}}</h4>
                                  @for($i=1; $i <= $reviewProduct->quantity_star; $i++)
                                    <i class="fa fa-star"></i>
                                  @endfor 
                              </div>
                          </div>
                          <p>{{$reviewProduct->review}}</p>
                      </div>
                      @endforeach
                    @else
                      <p style="text-align: center;">There are no reviews for this product yet. Buy now and be the first to review.</p>
                    @endif
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
          <h2>Related products</h2>
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
              <!-- <li><a href="#"><i class="fa fa-retweet"></i></a></li> -->
              <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
            </ul>
          </div>
          <div class="product__item__text">
            <h6><a href="{{URL::to('/detail-product/'.$item->id)}}">{{$item->name}}</a></h6>
            @if($item->discount > 0)
              <div style="color: red; text-decoration: line-through;";>{{number_format(($item->price), 0)}}đ</div>
            @endif  
            <h5>{{number_format(($item->price - $item->price*$item->discount*0.01), 0)}}đ</h5>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
<!-- Related Product Section End -->
@endsection

@section('cssReviewProduct')
  <link href="{{asset('css/review_product.css')}}" rel="stylesheet">
@endsection
@section('jsCloseAlert')
<script type="text/javascript">
  $(document).ready(function() {
    setTimeout(function() {
        $(".alert").alert('close');
    }, 5000);
  });
</script>
@endsection
