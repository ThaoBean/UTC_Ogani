@extends('clientPages.master')
@section('content')
@include("clientPages.brand_")
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="https://png.pngtree.com/thumb_back/fh260/back_our/20190619/ourmid/pngtree-fresh-and-elegant-background-cosmetics-banner-material-image_131723.jpg">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <div class="breadcrumb__text">
          <h2>Giỏ hàng</h2>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Breadcrumb Section End -->
<!-- Shoping Cart Section Begin -->
  <section class="shoping-cart spad">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <div class="shoping__cart__table">
                      <table>
                          <thead>
                              <tr>
                                  <th class="shoping__product">Sản phẩm</th>
                                  <th>Giá</th>
                                  <th>Giảm giá</th>
                                  <th>Số lượng</th>
                                  <th>Tồng tiền</th>
                                  <th></th>
                              </tr>
                          </thead>
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
                                    {{number_format($mycart->price*$mycart->discount*0.01, 0)}}đ
                                  </td>
                                  <td class="shoping__cart__quantity">
                                      <div class="quantity">
                                          <div class="pro-qty">
                                              <input type="text" value="{{$mycart->quantity_cart}}">
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
                      </table>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="col-lg-12">
                  <div class="shoping__cart__btns">
                      <a href="{{URL::to('/continue-shopping')}}" class="primary-btn cart-btn">Tiếp tục mua sắm</a>
                      <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                          Cập nhật giỏ hàng</a>
                  </div>
              </div>
              <div class="col-lg-6">
                  <!-- <div class="shoping__continue">
                      <div class="shoping__discount">
                          <h5>Mã giảm giá</h5>
                          <form action="#">
                              <input type="text" placeholder="Enter your coupon code">
                              <button type="submit" class="site-btn">APPLY COUPON</button>
                          </form>
                      </div>
                  </div> -->
              </div>
              <div class="col-lg-6">
                  <div class="shoping__checkout">
                      <h5>Tổng tiền</h5>
                      <ul>
                          <li>Tiền hàng <span>{{number_format($totalPrice, 0)}}đ</span></li>
                          @if ($totalPrice > 499000)
                            <li>Phí vẫn chuyển <span>0đ</span></li>
                          @else
                            <li>Phí vẫn chuyển <span>30,000đ</span></li>
                          @endif
                          <li>Tổng tiền <span>{{number_format($total, 0)}}đ</span></li>
                      </ul>
                      <a href="{{URL::to('/checkout')}}" class="primary-btn">Mua hàng</a>
                  </div>
              </div>
          </div>
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
              title: `Bạn chắc chắn muốn xóa sản phẩm này?`,
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
@endsection