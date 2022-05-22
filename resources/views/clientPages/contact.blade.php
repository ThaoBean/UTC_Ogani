@extends('clientPages.master')
@section('content')
@include("clientPages.brand_")
@if($success = Session::get('success'))
<div class="fixed-bottom">
  <div class="col-lg-3 col-md-12">
    <div class="alert alert-success alert-dismissible fade show">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Success!</strong> {{$success}}
    </div>
  </div>
</div>
@endif
@if($failed = Session::get('failed'))
<div class="fixed-bottom">
  <div class="col-lg-3 col-md-12">
    <div class="alert alert-danger alert-dismissible fade show">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <strong>Failed!</strong> {{$failed}}
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
          <h2>Contact us</h2>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Breadcrumb Section End -->
<!-- Contact Section Begin -->
<section class="contact spad">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-3 col-sm-6 text-center">
        <div class="contact__widget">
          <span class="icon_phone"></span>
          <h4>Phone</h4>
          <p>0868.128.559</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-6 text-center">
        <div class="contact__widget">
          <span class="icon_pin_alt"></span>
          <h4>Address</h4>
          <p>No.3 Cau Giay Street, Lang Thuong ward, Dong Da District, Hanoi, Vietnam.</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-6 text-center">
        <div class="contact__widget">
          <span class="icon_clock_alt"></span>
          <h4>Open time</h4>
          <p>8:00 am to 22:00 pm</p>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-6 text-center">
        <div class="contact__widget">
          <span class="icon_mail_alt"></span>
          <h4>Email</h4>
          <p> thaodo@gmail.com</p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Contact Section End -->
<!-- Map Begin -->
<div class="map">
  <iframe
    src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d29792.905824636655!2d105.803421!3d21.028155!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xbe3a7f3670c0a45f!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBHaWFvIHRow7RuZyBW4bqtbiB04bqjaSAoVVRDKQ!5e0!3m2!1svi!2sus!4v1616752216225!5m2!1svi!2sus"
    height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
  <div class="map-inside">
    <i class="icon_pin"></i>
    <div class="inside-widget" style="padding: 20px;">
      <h4>Vietnam</h4>
      <ul>
        <li>Phone: 0868.128.559</li>
        <li>Add: No.3 Cau Giay Street, Lang Thuong ward, Dong Da District, Hanoi, Vietnam.</li>
      </ul>
    </div>
  </div>
</div>
<!-- Map End -->
<!-- Contact Form Begin -->
<div class="contact-form spad">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="contact__form__title">
          <h2>Leave Message</h2>
        </div>
      </div>
    </div>
    <form method="post" action="{{URL::to('/send-contact')}}">
      <div class="row">
        <div class="col-lg-4 col-md-4">
          @error('fullName')
          <span class="text-danger">{{ $message }}</span>
          @enderror
          <input type="text" name="fullName" value="{{old('fullName')}}" placeholder="Your name">
        </div>
        <div class="col-lg-4 col-md-4">
          @error('email')
          <span class="text-danger">{{ $message }}</span>
          @enderror
          <input type="text" name="email" value="{{old('email')}}" placeholder="Your Email">
        </div>
        <div class="col-lg-4 col-md-4">
          @error('phone')
          <span  class="text-danger">{{ $message }}</span>
          @enderror
          <input type="text" name="phone" value="{{old('phone')}}" placeholder="Phone number">
        </div>
        <div class="col-lg-12">
          @error('message')
          <span  class="text-danger">{{ $message }}</span>
          @enderror
          <textarea name="message" placeholder="Your message"></textarea>
        </div>
        <div class="col-lg-12 text-center">
          <button type="submit" class="site-btn">SEND MESSAGE</button>
        </div>
      </div>
      @csrf
    </form>
  </div>
</div>
<!-- Contact Form End -->
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