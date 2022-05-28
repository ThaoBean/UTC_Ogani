<!DOCTYPE html>
<html lang="zxx">
  <head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani</title>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('css/style.css')}}" type="text/css">
    @yield('cssCustomInput')
    @yield('cssListHistoryOrder')
    @yield('cssReviewProduct')
  </head>
  <body>
    <!-- Page Preloder -->
    <div id="preloder">
      <div class="loader"></div>
    </div>
    <!-- Header Section Begin -->
    @include("clientPages.header")
    <!-- Header Section End -->
    @yield('content')

    <!-- Banner Begin -->
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <!-- Latest Product Section End -->
    
    <!-- Blog Section Begin -->

    <!-- <section class="from-blog spad">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="section-title from-blog__title">
              <h2>From The Blog</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="blog__item">
              <div class="blog__item__pic">
                <img src="img/blog/blog-1.jpg" alt="">
              </div>
              <div class="blog__item__text">
                <ul>
                  <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                  <li><i class="fa fa-comment-o"></i> 5</li>
                </ul>
                <h5><a href="#">Cooking tips make cooking simple</a></h5>
                <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="blog__item">
              <div class="blog__item__pic">
                <img src="img/blog/blog-2.jpg" alt="">
              </div>
              <div class="blog__item__text">
                <ul>
                  <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                  <li><i class="fa fa-comment-o"></i> 5</li>
                </ul>
                <h5><a href="#">6 ways to prepare breakfast for 30</a></h5>
                <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-6">
            <div class="blog__item">
              <div class="blog__item__pic">
                <img src="img/blog/blog-3.jpg" alt="">
              </div>
              <div class="blog__item__text">
                <ul>
                  <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                  <li><i class="fa fa-comment-o"></i> 5</li>
                </ul>
                <h5><a href="#">Visit the clean farm in the US</a></h5>
                <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->
    
    <!-- Blog Section End -->
    <!-- Footer Section Begin -->
    @include("clientPages.footer")
    </footer>
    <!-- Footer Section End -->
    <!-- Js Plugins -->
    <script src="https://kit.fontawesome.com/4a22766421.js" crossorigin="anonymous"></script>
    <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('js/mixitup.min.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    <!-- chat bot -->
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
      var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
      (function(){
      var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
      s1.async=true;
      s1.src='https://embed.tawk.to/6191e3d96885f60a50bbc9bf/1fkgu42tr';
      s1.charset='UTF-8';
      s1.setAttribute('crossorigin','*');
      s0.parentNode.insertBefore(s1,s0);
      })();
    </script>
    <!--End of Tawk.to Script-->
    <!-- end chat bot -->
    @yield('jsDelCart')
    @yield('jsListHistoryOrder')
    @yield('jsMyProfile')
    @yield('jsCloseAlert')
  </body>
</html>