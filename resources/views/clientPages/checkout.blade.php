@extends('clientPages.master')
@section('content')
@include("clientPages.brand_")
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="https://png.pngtree.com/thumb_back/fh260/back_our/20190619/ourmid/pngtree-fresh-and-elegant-background-cosmetics-banner-material-image_131723.jpg">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <div class="breadcrumb__text">
              <h2>Đặt hàng</h2>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Breadcrumb Section End -->
    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <h4>Thông tin đặt hàng</h4>
                <form action="{{URL::to('/place-order')}}" method="post">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="checkout__input">
                                <p>Họ tên người nhận<span>*</span></p>
                                <input type="text" name="receiver" value="{{$receiver}}">
                                @error('receiver')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="checkout__input">
                                <p>Số điện thoại<span>*</span></p>
                                <input type="text" name="phone_receiver" value="{{old('phone_receiver')}}">
                                @error('phone_receiver')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="checkout__input">
                                <p>Địa chỉ<span>*</span></p>
                                <input type="text" name="address_receiver" value="{{old('address_receiver')}}">
                                @error('address_receiver')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>                            
                            <div class="checkout__input">
                                <p>Ghi chú</p>
                                <textarea rows="10" name="note" style="width:100%; border:1px solid #ebebeb; padding:16px; color:#b2b2b2"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="checkout__order">
                                <h4>Đơn hàng</h4>
                                <div class="checkout__order__products">Sản phẩm <span>Thành tiền</span></div>
                                <ul>
                                  @foreach($myCart as $mycart)
                                    <li >{{$mycart->name}}
                                      <span>
                                      {{number_format(($mycart->price - $mycart->price*$mycart->discount*0.01)*$mycart->quantity_cart, 0)}}đ
                                      </span>
                                    </li>
                                  @endforeach
                                </ul>
                                <div class="checkout__order__subtotal">Tạm tính <span>{{number_format($totalPrice, 0)}}đ</span></div>
                                @if ($totalPrice > 499000)
                                  <div class="checkout__order__subtotal">Phí vận chuyển <span>0đ</span></div>
                                @else
                                  <div class="checkout__order__subtotal">Phí vận chuyển <span>30,000đ</span></div>
                                @endif
                                <div class="checkout__order__total">Tổng tiền <span>{{number_format($total, 0)}}đ</span></div>
                                <p>Chọn hình thức thanh toán</p>
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Thanh toán khi nhận hàng
                                        <input type="checkbox" id="payment" name="payment" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        Paypal
                                        <input type="checkbox" id="paypal" name="paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <button type="submit" class="site-btn">Đặt hàng</button>
                            </div>
                        </div>
                    </div>
                    @csrf
                </form>
            </div>
        </div>
    </section>
  <!-- Checkout Section End -->
@endsection