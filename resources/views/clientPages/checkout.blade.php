@extends('clientPages.master')
@section('content')
@include("clientPages.brand_")
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="https://png.pngtree.com/thumb_back/fh260/back_our/20190619/ourmid/pngtree-fresh-and-elegant-background-cosmetics-banner-material-image_131723.jpg">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <div class="breadcrumb__text">
              <h2>Place order</h2>
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
                <h4>Information</h4>
                <form action="{{URL::to('/place-order')}}" method="post">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="checkout__input">
                                <p>Receiver<span>*</span></p>
                                <input type="text" name="receiver" value="{{$receiver}}">
                                @error('receiver')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="checkout__input">
                                <p>Phone number<span>*</span></p>
                                <input type="text" name="phone_receiver" value="{{$phone_number}}">
                                @error('phone_receiver')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" name="address_receiver" value="{{$address}}">
                                @error('address_receiver')
                                  <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>                            
                            <div class="checkout__input">
                                <p>Note</p>
                                <textarea rows="10" name="note" style="width:100%; border:1px solid #ebebeb; padding:16px; color:#b2b2b2"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="checkout__order">
                                <h4>Orders</h4>
                                <div class="checkout__order__products">Product <span>Price</span></div>
                                <ul>
                                  @foreach($myCart as $mycart)
                                    <li >{{$mycart->name}} x <strong>{{$mycart->quantity_cart}}</strong>
                                      <span>
                                      {{number_format(($mycart->price - $mycart->price*$mycart->discount*0.01)*$mycart->quantity_cart, 0)}}đ
                                      </span>
                                    </li>
                                  @endforeach
                                </ul>
                                <div class="checkout__order__subtotal">Price product <span>{{number_format($totalPrice, 0)}}đ</span></div>
                                @if ($totalPrice > 499000)
                                  <div class="checkout__order__subtotal">Fee shipping<span>0đ</span></div>
                                @else
                                  <div class="checkout__order__subtotal">Fee shipping <span>30,000đ</span></div>
                                @endif
                                <div class="checkout__order__total">Total price <span>{{number_format($total, 0)}}đ</span></div>
                                <p>Chọn hình thức thanh toán</p>
                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                      Payment on delivery
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
                                <button type="submit" class="site-btn">Place Order</button>
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