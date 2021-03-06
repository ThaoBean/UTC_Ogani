@extends('clientPages.master')
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
  <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="https://png.pngtree.com/thumb_back/fh260/back_our/20190619/ourmid/pngtree-fresh-and-elegant-background-cosmetics-banner-material-image_131723.jpg">
          <div class="container">
            <div class="row">
              <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                  <h2>My Favorite Products</h2>
                </div>
              </div>
            </div>
          </div>
    </section>
  <!-- Breadcrumb Section End -->

<!-- Related Product Section Begin -->
<section class="related-product">
  <div class="container">
    <div class="row" style="margin-top: 30px;">
    @if(count($listProductFavorite) > 0)
      @foreach($listProductFavorite as $item)
      <div class="col-lg-3 col-md-4 col-sm-6">
        <div class="product__item">
          <div class="product__item__pic set-bg" data-setbg="{{URL::to('storage/images/'.$item->image)}}">
            <ul class="product__item__pic__hover">
              <li><a href="{{URL::to('/add-to-favorite/'.$item->id)}}"><i class="fa fa-heart" style="color:red;"></i></a></li>
              <li>
              <form method="post" action="{{URL::to('/add-to-favorite/'.$item->id)}}">
                <button style="border:none; background: transparent;" type="submit"><a><i class="fa fa-shopping-cart"></i></a></button>
                @csrf
              </form>
              </li>
            </ul>
          </div>
          <div class="product__item__text">
            <h6><a href="{{URL::to('/detail-product/'.$item->id)}}">{{$item->name}}</a></h6>
            @if($item->discount > 0)
              <div style="color: red; text-decoration: line-through;";>{{number_format(($item->price), 0)}}??</div>
            @endif  
            <h5>{{number_format(($item->price - $item->price*$item->discount*0.01), 0)}}??</h5>
          </div>
        </div>
      </div>
      @endforeach
      @else
      <p style="text-align:center; margin-top: 30px;">You haven't had any favorite products yet.</p>
      @endif
    </div>
  </div>
</section>
<!-- Related Product Section End -->
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