@extends('clientPages.master')
@section('content')
  <!-- Hero Section Begin -->
  @include("clientPages.brand")
  <!-- Hero Section End -->
  <!-- Categories Section Begin -->
  @include("clientPages.categories")
  <!-- Categories Section End -->
  <!-- Featured Section Begin -->
  @include("clientPages.products.featuredProduct")
  <!-- Featured Section End -->
  <!-- Banner Begin -->
  <div class="banner">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="banner__pic">
            <img src="https://mir-s3-cdn-cf.behance.net/project_modules/1400/76b6b670584061.6044dc66bfe7f.jpg" alt="">
          </div>
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6">
          <div class="banner__pic">
            <img src="https://wcomvn.s3.ap-southeast-1.amazonaws.com/image/2020/05/26080814/banner-mau-xanh-va-vang-nhat-NO001.jpg" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Banner End -->
  <!-- Latest Product Section Begin -->
  <section class="latest-product spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6">
          <div class="latest-product__text">
            <h4>Latest Products</h4>
            <div class="latest-product__slider owl-carousel">
                <div class="latest-prdouct__slider__item">
                  @for($i=0; $i<=2; $i++)
                  <a href="{{URL::to('/detail-product/'.$productsLatest[$i]->id)}}" class="latest-product__item">
                    <div class="latest-product__item__pic">
                      <img src="{{URL::to('storage/images/'.$productsLatest[$i]->image)}}" alt="">
                    </div>
                    <div class="latest-product__item__text">
                      <h6>{{$productsLatest[$i]->name}}</h6>
                      <span>{{number_format($productsLatest[$i]->price - $productsLatest[$i]->price*$productsLatest[$i]->discount*0.01, 0)}}đ</span>
                      @if($productsLatest[$i]->discount > 0)
                        <div style="color: red; text-decoration: line-through;";>{{number_format(($productsLatest[$i]->price), 0)}}đ</div>
                      @endif 
                    </div>
                  </a>
                  @endfor                                     
                </div>
                <div class="latest-prdouct__slider__item">
                  @for($i=3; $i<=count($productsLatest)-1; $i++)
                  <a href="{{URL::to('/detail-product/'.$productsLatest[$i]->id)}}" class="latest-product__item">
                    <div class="latest-product__item__pic">
                      <img src="{{URL::to('storage/images/'.$productsLatest[$i]->image)}}" alt="">
                    </div>
                    <div class="latest-product__item__text">
                      <h6>{{$productsLatest[$i]->name}}</h6>
                      <span>{{number_format($productsLatest[$i]->price - $productsLatest[$i]->price*$productsLatest[$i]->discount*0.01, 0)}}đ</span>
                      @if($productsLatest[$i]->discount > 0)
                        <div style="color: red; text-decoration: line-through;";>{{number_format(($productsLatest[$i]->price), 0)}}đ</div>
                      @endif 
                    </div>
                  </a>
                  @endfor 
                </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="latest-product__text">
            <h4>Top Sale Off</h4>
            <div class="latest-product__slider owl-carousel">
                <div class="latest-prdouct__slider__item">
                  @for($i=0; $i<=2; $i++)
                  <a href="{{URL::to('/detail-product/'.$productsSale[$i]->id)}}" class="latest-product__item">
                    <div class="latest-product__item__pic" style="position:relative">
                      <img src="{{URL::to('storage/images/'.$productsSale[$i]->image)}}" alt="">
                      <div style="position:absolute; top: 0px; right: 0px; color: white; display: inline; padding: 8px; border-radius: 50%; background-color:red;" 
                        class="product__discount__percent">
                          {{number_format($productsSale[$i]->discount, 0)}}%
                      </div>
                    </div>
                    <div class="latest-product__item__text">
                      <h6>{{$productsSale[$i]->name}}</h6>
                      <span>{{number_format($productsSale[$i]->price - $productsSale[$i]->price*$productsSale[$i]->discount*0.01, 0)}}đ</span>
                      @if($productsSale[$i]->discount > 0)
                        <div style="color: red; text-decoration: line-through;";>{{number_format(($productsSale[$i]->price), 0)}}đ</div>
                      @endif 
                    </div>
                  </a>
                  @endfor                                     
                </div>
                <div class="latest-prdouct__slider__item">
                  @for($i=3; $i<=count($productsSale)-1; $i++)
                  <a href="{{URL::to('/detail-product/'.$productsSale[$i]->id)}}" class="latest-product__item">
                    <div class="latest-product__item__pic" style="position:relative">
                      <img src="{{URL::to('storage/images/'.$productsSale[$i]->image)}}" alt="">
                      <div style="position:absolute; top: 0px; right: 0px; color: white; display: inline; padding: 8px; border-radius: 50%; background-color:red;" 
                        class="product__discount__percent">
                          {{number_format($productsSale[$i]->discount, 0)}}%
                      </div>
                    </div>
                    <div class="latest-product__item__text">
                      <h6>{{$productsSale[$i]->name}}</h6>
                      <span>{{number_format($productsSale[$i]->price - $productsSale[$i]->price*$productsSale[$i]->discount*0.01, 0)}}đ</span>
                      @if($productsSale[$i]->discount > 0)
                        <div style="color: red; text-decoration: line-through;";>{{number_format(($productsSale[$i]->price), 0)}}đ</div>
                      @endif 
                    </div>
                  </a>
                  @endfor 
                </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="latest-product__text">
            <h4>Top Products</h4>
            <div class="latest-product__slider owl-carousel">
                <div class="latest-prdouct__slider__item">
                  @for($i=0; $i<=2; $i++)
                  <a href="{{URL::to('/detail-product/'.$topProducts[$i]->id)}}" class="latest-product__item">
                    <div class="latest-product__item__pic">
                      <img src="{{URL::to('storage/images/'.$topProducts[$i]->image)}}" alt="">
                    </div>
                    <div class="latest-product__item__text">
                      <h6>{{$topProducts[$i]->name}}</h6>
                      <span>{{number_format($topProducts[$i]->price - $topProducts[$i]->price*$topProducts[$i]->discount*0.01, 0)}}đ</span>
                      @if($topProducts[$i]->discount > 0)
                        <div style="color: red; text-decoration: line-through;";>{{number_format(($topProducts[$i]->price), 0)}}đ</div>
                      @endif 
                    </div>
                  </a>
                  @endfor                                     
                </div>
                <div class="latest-prdouct__slider__item">
                  @for($i=3; $i<=count($topProducts)-1; $i++)
                  <a href="{{URL::to('/detail-product/'.$topProducts[$i]->id)}}" class="latest-product__item">
                    <div class="latest-product__item__pic">
                      <img src="{{URL::to('storage/images/'.$topProducts[$i]->image)}}" alt="">
                    </div>
                    <div class="latest-product__item__text">
                      <h6>{{$topProducts[$i]->name}}</h6>
                      <span>{{number_format($topProducts[$i]->price - $topProducts[$i]->price*$topProducts[$i]->discount*0.01, 0)}}đ</span>
                      @if($topProducts[$i]->discount > 0)
                        <div style="color: red; text-decoration: line-through;";>{{number_format(($topProducts[$i]->price), 0)}}đ</div>
                      @endif 
                    </div>
                  </a>
                  @endfor 
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Latest Product Section End -->
@endsection