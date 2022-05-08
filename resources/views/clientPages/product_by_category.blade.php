@extends('clientPages.master')
@section('content')
@include("clientPages.brand_")
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="https://png.pngtree.com/thumb_back/fh260/back_our/20190619/ourmid/pngtree-fresh-and-elegant-background-cosmetics-banner-material-image_131723.jpg">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <div class="breadcrumb__text">
          <h2>{{$category->category}}</h2>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Breadcrumb Section End -->
<!-- Product Section Begin -->
<section class="product spad">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-5">
        <div class="sidebar">
          <div class="sidebar__item">
            <h4>Thương hiệu</h4>
            <ul>
              @foreach($brands as $brand)
              <li><a href="{{URL::to('/products-by-brand/'.$brand->id)}}">{{$brand->brand}}</a></li>
              @endforeach
            </ul>
          </div>
          <div class="sidebar__item">
            <div class="latest-product__text">
              <h4>Sản phẩm mới</h4>
              <div class="latest-product__slider owl-carousel">
                <div class="latest-prdouct__slider__item">
                  @for($i=0; $i<=2; $i++)
                  <a href="{{URL::to('/detail-product/'.$productsLatest[$i]->id)}}" class="latest-product__item">
                    <div class="latest-product__item__pic">
                      <img src="{{URL::to('storage/images/'.$productsLatest[$i]->image)}}" alt="">
                    </div>
                    <div class="latest-product__item__text">
                      <h6>{{$productsLatest[$i]->name}}</h6>
                      <span>{{number_format($productsLatest[$i]->price - $productsLatest[$i]->discount*0.1, 0)}}đ</span>
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
                      <span>{{number_format($productsLatest[$i]->price - $productsLatest[$i]->discount*0.1, 0)}}đ</span>
                    </div>
                  </a>
                  @endfor 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-9 col-md-7">
        <div class="product__discount">
          <div class="section-title product__discount__title">
            <h2>Sale Off</h2>
          </div>
          <div class="row">
            <div class="product__discount__slider owl-carousel">
              @foreach($productsOnSale as $productOnSale)
              <div class="col-lg-4">
                <div class="product__discount__item">
                  <div class="product__discount__item__pic set-bg"
                    data-setbg="{{URL::to('storage/images/'.$productOnSale->image)}}">
                    <div class="product__discount__percent">{{number_format($productOnSale->discount, 0)}}%</div>
                    <ul class="product__item__pic__hover">
                      <li><a href="#"><i class="fa fa-heart"></i></a></li>
                      <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                      <li>
                        <form method="post" action="{{URL::to('/add-to-cart/'.$productOnSale->id)}}">
                          <button style="border:none; background: transparent;" type="submit"><a><i class="fa fa-shopping-cart"></i></a></button>
                          @csrf
                        </form>
                      </li>
                    </ul>
                  </div>
                  <div class="product__discount__item__text">
                    <!-- <span></span> -->
                    <h5><a href="{{URL::to('/detail-product/'.$productOnSale->id)}}">{{$productOnSale->name}}</a></h5>
                    <div class="product__item__price">
                      {{number_format($productOnSale->price - $productOnSale->discount*0.1, 0)}}đ
                      <span>{{number_format($productOnSale->price, 0)}}đ</span>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
        <div class="filter__item">
          <div class="row">
            <div class="col-lg-4 col-md-5">
              <div class="filter__sort">
                <span>Lọc theo</span>
                <select>
                  <option value="0">Default</option>
                  <option value="0">Default</option>
                </select>
              </div>
            </div>
            <div class="col-lg-4 col-md-4">
              <div class="filter__found">
                <h6><span>16</span> Products found</h6>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          @foreach($productsFilter as $productFilter)
          <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="product__item">
              <div class="product__item__pic set-bg" data-setbg="{{URL::to('storage/images/'.$productFilter->image)}}">
                <ul class="product__item__pic__hover">
                  <li><a href="#"><i class="fa fa-heart"></i></a></li>
                  <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                  <li>
                    <form method="post" action="{{URL::to('/add-to-cart/'.$productFilter->id)}}">
                      <button style="border:none; background: transparent;" type="submit"><a><i class="fa fa-shopping-cart"></i></a></button>
                      @csrf
                    </form>
                  </li>
                </ul>
              </div>
              <div class="product__item__text">
                <h6><a href="{{URL::to('/detail-product/'.$productFilter->id)}}">{{$productFilter->name}}</a></h6>
                <h5>{{number_format($productFilter->price - $productFilter->discount*0.1, 0)}}đ</h5>
              </div>
            </div>
          </div>
          @endforeach  
        </div>
        <div class="row">
          <div class="col-md-12 d-flex justify-content-center pt-1">
            {{$productsFilter->links()}}
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Product Section End -->
@endsection