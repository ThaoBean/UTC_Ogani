<header class="header">
  <div class="header__top">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6">
          <div class="header__top__left">
            <ul>
              <li><i class="fa fa-envelope"></i> thaodo@gmail.com</li>
              <li>Free Shipping for all Order from 499.000đ</li>
            </ul>
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="header__top__right">
            <div class="header__top__right__social">
              <a href="#"><i class="fa fa-facebook"></i></a>
              <a href="#"><i class="fa fa-twitter"></i></a>
              <a href="#"><i class="fa fa-linkedin"></i></a>
              <a href="#"><i class="fa fa-pinterest-p"></i></a>
            </div>
            <div class="header__top__right__language">
              <img src="{{asset('img/language.png')}}" alt="">
              <div>English</div>
              <span class="arrow_carrot-down"></span>
              <ul>
                <li><a href="#">Vietnamese</a></li>
                <li><a href="#">English</a></li>
              </ul>
            </div>
            @if (Auth::check())
                <div class="header__top__right__auth">
                  <a href="{{URL::to('/my-profile')}}"><i class="fa fa-user"></i>{{Auth::user()->name}}</a>
                </div>
                <div class="header__top__right__auth">
                  <a href="/logout"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
                </div>
            @else
              <div class="header__top__right__auth">
                <a href="/login"><i class="fa fa-user"></i> Login</a>
              </div>
              <div class="header__top__right__auth">
                <a href="/register"><i class="fa fa-registered" aria-hidden="true"></i>Register</a>
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-lg-3">
        <div class="header__logo">
          <a href="{{URL::to('/')}}"><img src="{{asset('img/logo.png')}}" alt=""></a>
        </div>
      </div>
      <div class="col-lg-6">
        <nav class="header__menu">
          <ul>
            <li class="active"><a href="{{URL::to('/')}}">Home</a></li>
            <li>
              <a href="">My order</a>
              <ul class="header__menu__dropdown">
                <li><a href="{{URL::to('/my-cart')}}">My Cart</a></li>
                <li><a href="{{URL::to('/history-order')}}">History order</a></li>
              </ul>
            </li>
            <li><a style="color:red;" href="./blog.html">Sale off</a></li>
            <li><a href="{{URL::to('/contact-us')}}">Contact</a></li>
          </ul>
        </nav>
      </div>
      <div class="col-lg-3">
        <div class="header__cart">
          <ul>
            <li><a href="{{URL::to('/list-my-favorite-product')}}"><i class="fa fa-heart"></i> <span>{{$totalFavorite ?? 0}}</span></a></li>
            <li><a href="{{URL::to('/my-cart')}}"><i class="fa fa-shopping-bag"></i> <span>{{$totalOrder ?? 0}}</span></a></li>
          </ul>
          <div class="header__cart__price">item: <span>{{number_format($totalPrice)}}đ</span></div>
        </div>
      </div>
    </div>
    <div class="humberger__open">
      <i class="fa fa-bars"></i>
    </div>
  </div>
</header>