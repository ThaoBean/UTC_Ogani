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
            <div class="form-validation">
              <form class="form-valide" action="{{URL::to('/admin/store-product')}}" method="post" enctype="multipart/form-data">
                <!-- Name -->
                <div class="form-group row">
                  <label class="col-lg-2 col-form-label">Product <span class="text-danger">*</span>
                  </label>
                  <div class="col-lg-8">
                    <input type="text" class="form-control" name="product" placeholder="Enter name product">
                  </div>
                </div>
                </div>
                @error('product')
                <div class="form-group row">
                  <label class="col-lg-2 col-form-label" ></label>
                  <div class="col-lg-8">
                    <div class="col-lg-12 col-form-label text-danger" >{{ $message }}</div>
                  </div>
                </div>
                @enderror
                <!-- End -->
                <!-- Short-desc -->
                <div class="form-group row">
                  <label class="col-lg-2 col-form-label">Short description</span>
                  </label>
                  <div class="col-lg-8">
                    <textarea  rows="3" class="form-control" name="short_desc" placeholder="Enter short description"></textarea>
                  </div>
                </div>
                <!-- End -->
                <!-- Description -->
                <div class="form-group row">
                  <label class="col-lg-2 col-form-label">Description <span class="text-danger">*</span>
                  </label>
                  <!-- <div class="col-lg-8">
                    <input type="text" class="form-control" name="description" placeholder="Nh???p th??ng tin chi ti???t s???n ph???m">
                  </div> -->
                  <div class="col-lg-8">
                    <textarea class="summernote" name="description"></textarea>
                  </div>
                </div>
                @error('description')
                <div class="form-group row">
                  <label class="col-lg-2 col-form-label" ></label>
                  <div class="col-lg-8">
                    <div class="col-lg-12 col-form-label text-danger" >{{ $message }}</div>
                  </div>
                </div>
                @enderror
                <!-- End -->
                <!-- Price -->
                <div class="form-group row">
                  <label class="col-lg-2 col-form-label" >Price <span class="text-danger">*</span>
                  </label>
                  <div class="col-lg-8">
                    <input type="number" oninput="validity.valid||(value='')" class="form-control" min="1" name="price" placeholder="Enter price">
                  </div>
                </div>
                @error('price')
                <div class="form-group row">
                  <label class="col-lg-2 col-form-label" ></label>
                  <div class="col-lg-8">
                    <div class="col-lg-12 col-form-label text-danger" >{{ $message }}</div>
                  </div>
                </div>
                @enderror
                <!-- End -->
                <!-- Discount -->
                <div class="form-group row">
                  <label class="col-lg-2 col-form-label" >Discount </label>
                  <div class="col-lg-8">
                    <input type="number" oninput="validity.valid||(value='')" class="form-control" min="0" max="100" name="discount" placeholder="Enter percent discount">
                  </div>
                </div>               
                <!-- End -->
                <!-- Quantity -->
                <div class="form-group row">
                  <label class="col-lg-2 col-form-label" >Quantity </span class="text-danger">*</span>
                  </label>
                  <div class="col-lg-8">
                    <input type="number" oninput="validity.valid||(value='')" min="0" class="form-control" name="quantity" placeholder="Enter quantity">
                  </div>
                </div>
                @error('quantity')
                <div class="form-group row">
                  <label class="col-lg-2 col-form-label" ></label>
                  <div class="col-lg-8">
                    <div class="col-lg-12 col-form-label text-danger" >{{ $message }}</div>
                  </div>
                </div>
                @enderror
                <!-- End -->
                <!-- Choose brand -->
                <div class="form-group row">
                  <label class="col-lg-2 col-form-label" for="val-skill">Brand <span class="text-danger">*</span>
                  </label>
                  <div class="col-lg-8">
                    <select class="form-control" id="val-skill" name="brand">
                      <option>Choose brand</option>
                      @foreach($brands as $brand)
                        <option value="{{$brand->id}}">{{$brand->brand}}</option>
                      @endforeach;
                    </select>
                  </div>
                </div>
                @error('brand')
                <div class="form-group row">
                  <label class="col-lg-2 col-form-label" ></label>
                  <div class="col-lg-8">
                    <div class="col-lg-12 col-form-label text-danger" >{{ $message }}</div>
                  </div>
                </div>
                @enderror
                <!-- End -->
                <!-- Choose Category -->
                <div class="form-group row">
                  <label class="col-lg-2 col-form-label" for="val-skill">Category <span class="text-danger">*</span>
                  </label>
                  <div class="col-lg-8">
                    <select class="form-control" id="val-skill" name="category">
                      <option>Choose Category</option>
                      @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->category}}</option>
                      @endforeach;
                    </select>
                  </div>
                </div>
                @error('category')
                <div class="form-group row">
                  <label class="col-lg-2 col-form-label" ></label>
                  <div class="col-lg-8">
                    <div class="col-lg-12 col-form-label text-danger" >{{ $message }}</div>
                  </div>
                </div>
                @enderror
                <!-- End -->
                <!-- Primary image -->
                <div class="form-group row">
                  <label class="col-lg-2 col-form-label">Primary Image <span class="text-danger">*</span>
                  </label>
                  <div class="col-lg-3">
                    <img id="preview" style="width: 200px; height: 200px; display: none;"/>
                    <input type="file" class="form-control" name="image" onChange="loadFile(event)">
                  </div>
                </div>
                @error('image')
                <div class="form-group row">
                  <label class="col-lg-2 col-form-label" ></label>
                  <div class="col-lg-8">
                    <div class="col-lg-12 col-form-label text-danger" >{{ $message }}</div>
                  </div>
                </div>
                @enderror
                <!-- End -->
                <!-- Detail Image -->
                <div class="form-group row">
                  <label class="col-lg-2 col-form-label">Detail image 1 <span class="text-danger">*</span>
                  </label>
                  <div class="col-lg-3">
                    <img id="preview1" style="width: 200px; height: 200px; display: none;"/>
                    <input type="file" class="form-control" name="image1" onChange="loadFile1(event)">
                  </div>
                </div>
                @error('image1')
                <div class="form-group row">
                  <label class="col-lg-2 col-form-label" ></label>
                  <div class="col-lg-8">
                    <div class="col-lg-12 col-form-label text-danger" >{{ $message }}</div>
                  </div>
                </div>
                @enderror
                <div class="form-group row">
                  <label class="col-lg-2 col-form-label">Detail image 2<span class="text-danger">*</span>
                  </label>
                  <div class="col-lg-3">
                    <img id="preview2" style="width: 200px; height: 200px; display: none;"/>
                    <input type="file" class="form-control" name="image2" onChange="loadFile2(event)">
                  </div>
                </div>
                @error('image2')
                <div class="form-group row">
                  <label class="col-lg-2 col-form-label" ></label>
                  <div class="col-lg-8">
                    <div class="col-lg-12 col-form-label text-danger" >{{ $message }}</div>
                  </div>
                </div>
                @enderror
                <div class="form-group row">
                  <label class="col-lg-2 col-form-label">Detail image 3 <span class="text-danger">*</span>
                  </label>
                  <div class="col-lg-3">
                    <img id="preview3" style="width: 200px; height: 200px; display: none;"/>
                    <input type="file" class="form-control" name="image3" onChange="loadFile3(event)">
                  </div>
                </div>
                @error('image3')
                <div class="form-group row">
                  <label class="col-lg-2 col-form-label" ></label>
                  <div class="col-lg-8">
                    <div class="col-lg-12 col-form-label text-danger" >{{ $message }}</div>
                  </div>
                </div>
                @enderror
                <div class="form-group row">
                  <label class="col-lg-2 col-form-label">Detail image 4<span class="text-danger">*</span>
                  </label>
                  <div class="col-lg-3">
                    <img id="preview4" style="width: 200px; height: 200px; display: none;"/>
                    <input type="file" class="form-control" name="image4" onChange="loadFile4(event)">
                  </div>
                </div>
                @error('image4')
                <div class="form-group row">
                  <label class="col-lg-2 col-form-label" ></label>
                  <div class="col-lg-8">
                    <div class="col-lg-12 col-form-label text-danger" >{{ $message }}</div>
                  </div>
                </div>
                @enderror
                <div class="form-group row">
                  <label class="col-lg-2 col-form-label">Detail image 5<span class="text-danger">*</span>
                  </label>
                  <div class="col-lg-3">
                    <img id="preview5" style="width: 200px; height: 200px; display: none;"/>
                    <input type="file" class="form-control" name="image5" onChange="loadFile5(event)">
                  </div>
                </div>
                @error('image5')
                <div class="form-group row">
                  <label class="col-lg-2 col-form-label" ></label>
                  <div class="col-lg-8">
                    <div class="col-lg-12 col-form-label text-danger" >{{ $message }}</div>
                  </div>
                </div>
                @enderror
                <!-- End Detail Image -->
                
                <!-- Featured -->
                <div class="form-group row">
                  <label class="col-lg-2 col-form-label" >Featured </label>
                  <div class="col-lg-8">
                    <input type="checkbox" name="featured">
                  </div>
                </div>
                <!-- End -->
                <div class="form-group row">
                  <div class="col-lg-10 ml-auto">
                    <button type="submit" class="btn btn-primary">Add</button>
                  </div>
                </div>
                @csrf
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- #/ container -->
</div>
<!--**********************************
  Content body end
  ***********************************-->
@endsection

@section('cssCreateProduct')
  <link href="{{asset('assets_admin/plugins/summernote/dist/summernote.css')}}" rel="stylesheet">
@endsection

@section('jsCreateProduct')
  <!-- <script src="{{asset('assets_admin/plugins/validation/jquery.validate.js')}}"></script>
  <script src="{{asset('assets_admin/plugins/validation/jquery.validate-init.js')}}"></script> -->
  <script src="{{asset('assets_admin/plugins/summernote/dist/summernote.min.js')}}"></script>
  <script src="{{asset('assets_admin/plugins/summernote/dist/summernote-init.js')}}"></script>
  <script type="text/javascript">
    var loadFile = function(event){
      var preview = document.getElementById('preview');
      preview.src = URL.createObjectURL(event.target.files[0])
      $('#preview').show();
    };
    var loadFile1 = function(event){
      var preview = document.getElementById('preview1');
      preview.src = URL.createObjectURL(event.target.files[0])
      $('#preview1').show();
    };
    var loadFile2 = function(event){
      var preview = document.getElementById('preview2');
      preview.src = URL.createObjectURL(event.target.files[0])
      $('#preview2').show();
    };
    var loadFile3 = function(event){
      var preview = document.getElementById('preview3');
      preview.src = URL.createObjectURL(event.target.files[0])
      $('#preview3').show();
    };
    var loadFile4 = function(event){
      var preview = document.getElementById('preview4');
      preview.src = URL.createObjectURL(event.target.files[0])
      $('#preview4').show();
    };
    var loadFile5 = function(event){
      var preview = document.getElementById('preview5');
      preview.src = URL.createObjectURL(event.target.files[0])
      $('#preview5').show();
    };
  </script>
@endsection

