<section class="hero">
  <div class="container">
    <div class="row">
      <div class="col-lg-3">
        <div class="hero__categories">
          <div class="hero__categories__all">
            <i class="fa fa-bars"></i>
            <span>Thương hiệu</span>
          </div>
          <ul>
            @foreach($brands as $brand)
              <li><a href="#">{{$brand -> brand}}</a></li>
            @endforeach
          </ul>
        </div>
      </div>
      <div class="col-lg-9">
        <div class="hero__search">
          <div class="hero__search__form">
            <form action="#">
              <div class="hero__search__categories">
                All Categories
              </div>
              <input type="text" placeholder="What do yo u need?">
              <button type="submit" class="site-btn">SEARCH</button>
            </form>
          </div>
          <div class="hero__search__phone">
            <div class="hero__search__phone__icon">
              <i class="fa fa-phone"></i>
            </div>
            <div class="hero__search__phone__text">
              <h5>0868.128.559</h5>
              <span>support 24/7 time</span>
            </div>
          </div>
        </div>
        <div class="hero__item set-bg" data-setbg="https://i.pinimg.com/474x/1d/e6/34/1de63414b7b8e27e5ea961b4a78fcf57.jpg">
          <div class="hero__text">
            <span>OGANI</span>
            <h2>Cometic <br />100% Natural</h2>
            <p>Free Pickup and Delivery Available</p>
            <a href="#" class="primary-btn">SHOP NOW</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>