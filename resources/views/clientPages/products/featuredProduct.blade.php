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
<section class="featured spad">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="section-title">
          <h2>Featured Products</h2>
        </div>
        <div class="featured__controls">
          <ul>
            <li class="active" data-filter="*">All</li>
            @foreach($categories as $category)
            <li data-filter=".category_id{{$category->id}}">{{$category->category}}</li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
    <div class="row featured__filter">
      <!--  -->
      
      @if(Auth::check())
      @foreach ($products as $product)
        <div class="col-lg-3 col-md-4 col-sm-6 mix category_id{{$product->category_id}}">
          <div class="featured__item">
            <div class="featured__item__pic set-bg" data-setbg="storage/images/{{$product->image}}">
              <ul class="featured__item__pic__hover">
                <li><a href="{{URL::to('/add-to-favorite/'.$product->id)}}"><i class="fa fa-heart" @if($product->user_id != null) style="color:red;" @endif></i></a></li>
                <li>
                  <form method="post" action="{{URL::to('/add-to-cart/'.$product->id)}}">
                    <button style="border:none; background: transparent;" type="submit"><a><i class="fa fa-shopping-cart"></i></a></button>
                    @csrf
                  </form>
                </li>
              </ul>
            </div>
            <div class="featured__item__text">
              <h6><a href="{{URL::to('/detail-product/'.$product->id)}}">{{$product->name}}</a></h6>
              @if($product->discount > 0)
                <div style="color: red; text-decoration: line-through;";>{{number_format(($product->price), 0)}}đ</div>
              @endif              
              <h5>{{number_format(($product->price - $product->price*$product->discount*0.01), 0)}}đ</h5>
            </div>
          </div>
        </div>
      @endforeach
      @else
      @foreach ($products as $product)
        <div class="col-lg-3 col-md-4 col-sm-6 mix category_id{{$product->category_id}}">
          <div class="featured__item">
            <div class="featured__item__pic set-bg" data-setbg="storage/images/{{$product->image}}">
              <ul class="featured__item__pic__hover">
                <li><a href="{{URL::to('/add-to-favorite/'.$product->id)}}"><i class="fa fa-heart"></i></a></li>
                <li>
                  <form method="post" action="{{URL::to('/add-to-cart/'.$product->id)}}">
                    <button style="border:none; background: transparent;" type="submit"><a><i class="fa fa-shopping-cart"></i></a></button>
                    @csrf
                  </form>
                </li>
              </ul>
            </div>
            <div class="featured__item__text">
              <h6><a href="{{URL::to('/detail-product/'.$product->id)}}">{{$product->name}}</a></h6>
              @if($product->discount > 0)
                <div style="color: red; text-decoration: line-through;";>{{number_format(($product->price), 0)}}đ</div>
              @endif              
              <h5>{{number_format(($product->price - $product->price*$product->discount*0.01), 0)}}đ</h5>
            </div>
          </div>
        </div>
      @endforeach
      @endif;
      <!--  -->
    </div>
  </div>
</section>
@section('jsCloseAlert')
<script type="text/javascript">
  $(document).ready(function() {
    setTimeout(function() {
        $(".alert").alert('close');
    }, 5000);
  });
</script>
@endsection