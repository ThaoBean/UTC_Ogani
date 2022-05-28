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
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Categories</a></li>
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
              <form class="form-valide" action="{{URL::to('/admin/update-category/'.$category->id)}}" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                  <label class="col-lg-4 col-form-label">Category <span class="text-danger">*</span>
                  </label>
                  <div class="col-lg-6">
                    <input type="text" class="form-control" value="{{$category->category}}" name="category" placeholder="Enter category">
                  </div>
                </div>
                @error('category')
                <div class="form-group row">
                  <label class="col-lg-4 col-form-label" ></label>
                  <div class="col-lg-6">
                    <div class="col-lg-12 col-form-label text-danger" >{{ $message }}</div>
                  </div>
                </div>
                @enderror

                <div class="form-group row">
                  <label class="col-lg-4 col-form-label">Image <span class="text-danger">*</span>
                  </label>
                  <div class="col-lg-6">
                    <img id="preview" src="{{URL::to('storage/images/'.$category->image)}}" style="width: 200px; height: 200px;"/>
                    <input type="file" class="form-control" name="image" onChange="loadFile(event)">
                  </div>
                </div>
                @error('image')
                <div class="form-group row">
                  <label class="col-lg-4 col-form-label" ></label>
                  <div class="col-lg-6">
                    <div class="col-lg-12 col-form-label text-danger" >{{ $message }}</div>
                  </div>
                </div>
                @enderror
                <div class="form-group row">
                  <div class="col-lg-8 ml-auto">
                    <button type="submit" class="btn btn-primary">Save changes</button>
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

@section('jsCreateCategory')
  <script src="{{asset('assets_admin/plugins/validation/jquery.validate.js')}}"></script>
  <script src="{{asset('assets_admin/plugins/validation/jquery.validate-init.js')}}"></script>
  <script type="text/javascript">
    var loadFile = function(event){
      var preview = document.getElementById('preview');
      preview.src = URL.createObjectURL(event.target.files[0])
    };
  </script>
@endsection

