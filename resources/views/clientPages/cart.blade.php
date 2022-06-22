@extends('clientPages.master')
@section('content')
@include("clientPages.brand_")

@section('cssCustomInput')
    <link rel="stylesheet" href="{{asset('css/custom.css')}}" type="text/css">
@endsection

@if($success = Session::get('error'))
<div class="fixed-bottom">
  <div class="col-lg-3 col-md-12">
    <div class="alert alert-warning alert-dismissible fade show">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Error! </strong> {{$error}}
    </div>
  </div>
</div>
@endif

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
          <h2>My Cart</h2>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Breadcrumb Section End -->
<!-- Shoping Cart Section Begin -->
  <section class="shoping-cart spad">
      <div class="container">
        <form method="post" action="{{URL::to('/update-cart')}}">
          <div class="row">
              <div class="col-lg-12">
                  <div class="shoping__cart__table">
                      <table>
                          <thead>
                              <tr>
                                  <th class="shoping__product">Product</th>
                                  <th>Price</th>
                                  <th>Discount</th>
                                  <th>Quantity</th>
                                  <th>Total Item</th>
                                  <th></th>
                              </tr>
                          </thead>
                          @if(count($myCart) > 0)
                          <tbody>
                            @foreach($myCart as $mycart)
                              <tr>
                                  <td class="shoping__cart__item">
                                      <img style="width: 100px; height: 100px" src="{{URL::to('storage/images/'.$mycart->image)}}" alt="">
                                      <h5><a style="color:#1c1c1c" href="{{URL::to('/detail-product/'.$mycart->product_id)}}">{{$mycart->name}}</a></h5>
                                  </td>
                                  <td class="shoping__cart__price">
                                    {{number_format($mycart->price, 0)}}đ
                                  </td>
                                  <td class="shoping__cart__price">
                                    {{number_format($mycart->price*$mycart->discount*0.01*$mycart->quantity_cart, 0)}}đ
                                  </td>
                                  <td class="shoping__cart__quantity">
                                      <div class="quantity">
                                          <div class="pro-qty">
                                              <input type="number" oninput="validity.valid||(value='{{$mycart->quantity_cart}}')" min="1" max="{{$mycart->quantity}}" value="{{$mycart->quantity_cart}}" name="idCart[{{$mycart->id}}]">
                                          </div>
                                      </div>
                                  </td>
                                  <td class="shoping__cart__total">
                                    {{number_format(($mycart->price - $mycart->price*$mycart->discount*0.01)*$mycart->quantity_cart, 0)}}đ
                                  </td>
                                  <td class="shoping__cart__item__close">
                                    <form method="POST" action="{{URL::to('/delete-product-cart/'.$mycart->id)}}">
                                        <button type="submit" class="show_confirm" style="border:none; background-color: transparent;">
                                            <span class="icon_close"></span>
                                        </button>
                                        @csrf
                                    </form>
                                  </td>
                              </tr>
                            @endforeach
                          </tbody>
                          @else
                          <tbody>
                            <tr><td colspan="5">Cart is empty</td></tr>
                          </tbody>
                          @endif
                      </table>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-lg-12">
                  <div class="shoping__cart__btns">
                      <a href="{{URL::to('/continue-shopping')}}" class="primary-btn cart-btn">Continue shopping</a>
                      @if(count($myCart) > 0)
                      <button style="border:none;" class="primary-btn cart-btn cart-btn-right">
                        <span class="icon_loading" type="submit"></span>
                        Update cart
                      </button>
                      @endif
                  </div>
              </div>
              <div class="col-lg-6"></div>
              @if(count($myCart) > 0)
              <div class="col-lg-6">
                  <div class="shoping__checkout">
                      <h5>Total</h5>
                      <ul>
                          <li>Total Items <span>{{number_format($totalPrice, 0)}}đ</span></li>
                          @if ($totalPrice > 499000)
                            <li>Fee shipping <span>0đ</span></li>
                          @else
                            <li>Fee shipping <span>30,000đ</span></li>
                          @endif
                          <li>Total money <span>{{number_format($total, 0)}}đ</span></li>
                      </ul>
                      <a href="{{URL::to('/checkout')}}" class="primary-btn">Checkout</a>
                  </div>
              </div>
              @endif
          </div>
        </form> 
      </div>
  </section>
<!-- Shoping Cart Section End -->
@endsection

@section('jsDelCart')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
  <script type="text/javascript">
    $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Do you want to delete this product?`,
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
      setTimeout(function() {
          $(".alert").alert('close');
      }, 5000);
    });
  </script>
@endsection