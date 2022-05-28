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
  <!-- <section class="latest-product spad">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6">
          <div class="latest-product__text">
            <h4>Latest Products</h4>
            <div class="latest-product__slider owl-carousel">
              <div class="latest-prdouct__slider__item">
                <a href="#" class="latest-product__item">
                  <div class="latest-product__item__pic">
                    <img src="https://cf.shopee.vn/file/9619b01afaad91a9f78579e221410a77" alt="">
                  </div>
                  <div class="latest-product__item__text">
                    <h6>Crab Pool Security</h6>
                    <span>$30.00</span>
                  </div>
                </a>
                <a href="#" class="latest-product__item">
                  <div class="latest-product__item__pic">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRRDpQd9UOWRsxPg-Bb6MyuifS0XeBHATzE7A&usqp=CAU" alt="">
                  </div>
                  <div class="latest-product__item__text">
                    <h6>Crab Pool Security</h6>
                    <span>$30.00</span>
                  </div>
                </a>
                <a href="#" class="latest-product__item">
                  <div class="latest-product__item__pic">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTTDewPOVPWYXUrwDmsybKKqA9MGhNBchuM4g&usqp=CAU" alt="">
                  </div>
                  <div class="latest-product__item__text">
                    <h6>Crab Pool Security</h6>
                    <span>$30.00</span>
                  </div>
                </a>
              </div>
              <div class="latest-prdouct__slider__item">
                <a href="#" class="latest-product__item">
                  <div class="latest-product__item__pic">
                    <img src="https://vifahealthcare.com/wp-content/uploads/2020/10/review-sua-rua-mat-cetaphil-gentle-skin-cleanser-2.jpg" alt="">
                  </div>
                  <div class="latest-product__item__text">
                    <h6>Crab Pool Security</h6>
                    <span>$30.00</span>
                  </div>
                </a>
                <a href="#" class="latest-product__item">
                  <div class="latest-product__item__pic">
                    <img src="https://cf.shopee.vn/file/1142413d1bcc67d82fad9005e9b20997" alt="">
                  </div>
                  <div class="latest-product__item__text">
                    <h6>Crab Pool Security</h6>
                    <span>$30.00</span>
                  </div>
                </a>
                <a href="#" class="latest-product__item">
                  <div class="latest-product__item__pic">
                    <img src="https://cdn.chanhtuoi.com/uploads/2021/01/w400/sua-rua-mat-murad-essential-c-cleanser-2.jpg.webp" alt="">
                  </div>
                  <div class="latest-product__item__text">
                    <h6>Crab Pool Security</h6>
                    <span>$30.00</span>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="latest-product__text">
            <h4>Top Rated Products</h4>
            <div class="latest-product__slider owl-carousel">
              <div class="latest-prdouct__slider__item">
                <a href="#" class="latest-product__item">
                  <div class="latest-product__item__pic">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQJD4r3LWtm2HY-i-Jtd-QGAVqFrI1b9TpLSQ&usqp=CAU" alt="">
                  </div>
                  <div class="latest-product__item__text">
                    <h6>Crab Pool Security</h6>
                    <span>$30.00</span>
                  </div>
                </a>
                <a href="#" class="latest-product__item">
                  <div class="latest-product__item__pic">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTzixoyAD19_-zMimEdMW_XC3SMSTdAJ2lReqG_eJmfzZ8SjqdBXUWd7gkY5kebbzxcXsE&usqp=CAU" alt="">
                  </div>
                  <div class="latest-product__item__text">
                    <h6>Crab Pool Security</h6>
                    <span>$30.00</span>
                  </div>
                </a>
                <a href="#" class="latest-product__item">
                  <div class="latest-product__item__pic">
                    <img src="https://cdn.chanhtuoi.com/uploads/2021/01/w400/sua-rua-mat-murad-essential-c-cleanser-2.jpg.webp" alt="">
                  </div>
                  <div class="latest-product__item__text">
                    <h6>Crab Pool Security</h6>
                    <span>$30.00</span>
                  </div>
                </a>
              </div>
              <div class="latest-prdouct__slider__item">
                <a href="#" class="latest-product__item">
                  <div class="latest-product__item__pic">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQMRp3Hh8lU_a25QrL24dk2WzNaUVXSZPZDpZPwl1nrkqHt7MZoeHk830CseIWJFCkqUFo&usqp=CAU" alt="">
                  </div>
                  <div class="latest-product__item__text">
                    <h6>Crab Pool Security</h6>
                    <span>$30.00</span>
                  </div>
                </a>
                <a href="#" class="latest-product__item">
                  <div class="latest-product__item__pic">
                    <img src="https://thietkebaobi.jai.vn/wp-content/uploads/2020/04/Cleo-Luxe-00.jpg" alt="">
                  </div>
                  <div class="latest-product__item__text">
                    <h6>Crab Pool Security</h6>
                    <span>$30.00</span>
                  </div>
                </a>
                <a href="#" class="latest-product__item">
                  <div class="latest-product__item__pic">
                    <img src="https://cocnguyetsansibell.vn/wp-content/uploads/2021/08/sua-rua-mat-Vichy-Normaderm-Anti-Imperfection.jpg" alt="">
                  </div>
                  <div class="latest-product__item__text">
                    <h6>Crab Pool Security</h6>
                    <span>$30.00</span>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="latest-product__text">
            <h4>Review Products</h4>
            <div class="latest-product__slider owl-carousel">
              <div class="latest-prdouct__slider__item">
                <a href="#" class="latest-product__item">
                  <div class="latest-product__item__pic">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQMRp3Hh8lU_a25QrL24dk2WzNaUVXSZPZDpZPwl1nrkqHt7MZoeHk830CseIWJFCkqUFo&usqp=CAU" alt="">
                  </div>
                  <div class="latest-product__item__text">
                    <h6>Crab Pool Security</h6>
                    <span>$30.00</span>
                  </div>
                </a>
                <a href="#" class="latest-product__item">
                  <div class="latest-product__item__pic">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQMRp3Hh8lU_a25QrL24dk2WzNaUVXSZPZDpZPwl1nrkqHt7MZoeHk830CseIWJFCkqUFo&usqp=CAU" alt="">
                  </div>
                  <div class="latest-product__item__text">
                    <h6>Crab Pool Security</h6>
                    <span>$30.00</span>
                  </div>
                </a>
                <a href="#" class="latest-product__item">
                  <div class="latest-product__item__pic">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQMRp3Hh8lU_a25QrL24dk2WzNaUVXSZPZDpZPwl1nrkqHt7MZoeHk830CseIWJFCkqUFo&usqp=CAU" alt="">
                  </div>
                  <div class="latest-product__item__text">
                    <h6>Crab Pool Security</h6>
                    <span>$30.00</span>
                  </div>
                </a>
              </div>
              <div class="latest-prdouct__slider__item">
                <a href="#" class="latest-product__item">
                  <div class="latest-product__item__pic">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQMRp3Hh8lU_a25QrL24dk2WzNaUVXSZPZDpZPwl1nrkqHt7MZoeHk830CseIWJFCkqUFo&usqp=CAU" alt="">
                  </div>
                  <div class="latest-product__item__text">
                    <h6>Crab Pool Security</h6>
                    <span>$30.00</span>
                  </div>
                </a>
                <a href="#" class="latest-product__item">
                  <div class="latest-product__item__pic">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQMRp3Hh8lU_a25QrL24dk2WzNaUVXSZPZDpZPwl1nrkqHt7MZoeHk830CseIWJFCkqUFo&usqp=CAU" alt="">
                  </div>
                  <div class="latest-product__item__text">
                    <h6>Crab Pool Security</h6>
                    <span>$30.00</span>
                  </div>
                </a>
                <a href="#" class="latest-product__item">
                  <div class="latest-product__item__pic">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQMRp3Hh8lU_a25QrL24dk2WzNaUVXSZPZDpZPwl1nrkqHt7MZoeHk830CseIWJFCkqUFo&usqp=CAU" alt="">
                  </div>
                  <div class="latest-product__item__text">
                    <h6>Crab Pool Security</h6>
                    <span>$30.00</span>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->
  <!-- Latest Product Section End -->
@endsection