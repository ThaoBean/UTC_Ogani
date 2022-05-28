@extends('adminPages.master')
@section('contentAdmin')
<!--**********************************
  Content body start
  ***********************************-->
<div class="content-body">
  <div class="row page-titles mx-0">
    <div class="col p-md-0">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Products</a></li>
      </ol>
    </div>
  </div>
  <!-- row -->
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <div class="form-group row">
              <label class="col-lg-2 col-form-label">Product </label>
              <div class="col-lg-8">
                <h3>{{$product->name}}</h3>
              </div>
            </div>
            <!-- End -->
            <!-- Short-desc -->
            <div class="form-group row">
              <label class="col-lg-2 col-form-label">Short description</label>
              <div class="col-lg-8">
                <div>{{$product->short_desc}}</div>
              </div>
            </div>
            <!-- End -->
            <!-- Description -->
            <div class="form-group row">
              <label class="col-lg-2 col-form-label">Description </label>
              <div class="col-lg-8">
                <div style="font-size: 16px;">{!!$product->description!!}</div>
              </div>
            </div>
            <!-- End -->
            <!-- Price -->
            <div class="form-group row">
              <label class="col-lg-2 col-form-label" >Price </label>
              <div class="col-lg-8">
                <div>{{number_format($product->price, 0)}}đ</div>
              </div>
            </div>
            <!-- End -->
            <!-- Discount -->
            <div class="form-group row">
              <label class="col-lg-2 col-form-label" >Discount </label>
              <div class="col-lg-8">
                <div>{{$product->discount}}%</div>
              </div>
            </div>
            <!-- End -->
            <!-- Quantity -->
            <div class="form-group row">
              <label class="col-lg-2 col-form-label" >Quantity </label>
              <div class="col-lg-8">
                <div>{{$product->quantity}}</div>
              </div>
            </div>
            <!-- End -->
            <!-- Choose brand -->
            <div class="form-group row">
              <label class="col-lg-2 col-form-label" for="val-skill">Brand </label>
              <div class="col-lg-8">
                <div>{{$brand->brand}}</div>
              </div>
            </div>
            <!-- End -->
            <!-- Choose Category -->
            <div class="form-group row">
              <label class="col-lg-2 col-form-label" for="val-skill">Category </label>
              <div class="col-lg-8">
                <div>{{$category->category}}</div>
              </div>
            </div>
            <!-- End -->
            <!-- Primary image -->
            <div class="form-group row">
              <label class="col-lg-2 col-form-label">Primary Image </label>
              <div class="col-lg-3">
                <img src="{{URL::to('storage/images/'.$product->image)}}" style="width: 200px; height: 200px; "/>
              </div>
            </div>
            <!-- End -->
            <!-- Detail Image -->
            @php
              $images = "$product->imageDetail";
              $arrImg = explode(",", $images);              
            @endphp
              <div class="form-group row">
                <label class="col-lg-2 col-form-label">Detail image </label>
                <div class="col-lg-10" style="display: flex; flex-wrap: wrap">
                  @foreach($arrImg as $img)
                    <img src="{{URL::to('storage/images/'.$img)}}" style="width: 200px; height: 200px; margin-right: 10px; margin-bottom: 10px;"/>
                  @endforeach        
                </div>
              </div>
            <!-- End Detail Image -->
            <!-- Featured -->
            <div class="form-group row">
              <label class="col-lg-2 col-form-label" >Featured </label>
              <div class="col-lg-8">
                <input type="checkbox" name="featured" {{$product->featured == 1 ? 'checked' : ''}} >
              </div>
            </div>
            <!-- End -->
            <div class="form-group row">
              <div class="col-lg-10 ml-auto">
                <a href="{{URL::to('/admin/list-product')}}" class="btn btn-primary">Back</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- #/ container -->
<!--**********************************
  Content body end
  ***********************************-->
@endsection