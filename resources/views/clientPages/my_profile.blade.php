@extends('clientPages.master')
@section('content')
@include("clientPages.brand_")
  <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="https://png.pngtree.com/thumb_back/fh260/back_our/20190619/ourmid/pngtree-fresh-and-elegant-background-cosmetics-banner-material-image_131723.jpg">
          <div class="container">
            <div class="row">
              <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                  <h2>My Profile</h2>
                </div>
              </div>
            </div>
          </div>
    </section>
  <!-- Breadcrumb Section End -->
  <div class="container" style="padding: 32px; border-radius: 10px; border: 1px solid #7fad39; margin-top: 30px; margin-bottom: 30px;">
    <form action="{{URL::to('/update-my-acc')}}" method="post" enctype="multipart/form-data">
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input type="text" readonly class="form-control-plaintext" value="{{$user->email}}">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Username</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" placeholder="Password" name="name" value="{{$user->name}}">
        </div>
      </div>
      @error('name')
        <div class="form-group row">
          <label class="col-lg-2 col-form-label" ></label>
          <div class="col-lg-10">
            <div class="col-lg-12 col-form-label text-danger" >{{ $message }}</div>
          </div>
        </div>
      @enderror
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Avatar</label>
        
        <div class="col-sm-10">
          @if($user->avatar)
            <img id="preview" src="{{URL::to('storage/images/'.$user->avatar)}}" style="width: 200px; height: 200px; border-radius: 50%; margin-bottom: 10px"/>
          @else
            <img id="preview" style="width: 200px; height: 200px; display: none; border-radius: 50%; margin-bottom: 10px"/>
          @endif
          <input type="file" class="form-control" name="avatar" onChange="loadFile(event)">
        </div>
      </div>
      @error('avatar')
        <div class="form-group row">
          <label class="col-lg-2 col-form-label" ></label>
          <div class="col-lg-10">
            <div class="col-lg-12 col-form-label text-danger" >{{ $message }}</div>
          </div>
        </div>
      @enderror
      <div class="form-group row">
        <div class="col-sm-2"></div>
        <div class="col-sm-10 d-flex justify-content-center">
          <button type="submit" class="btn btn-success">Update profile</button>
        </div>
      </div>
      @csrf
    </form> 

    <p style="font-size: 20px; color: red;">
      Change password
      <span style="font-size: 16px; color: red;">
        (If you don't change your password, you shouldn't enter this form.)
      </span>
    </p>

    <form action="{{URL::to('/change-password')}}" method="post" enctype="multipart/form-data">
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Current password</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" name="current_password" placeholder="Current password">
        </div>
      </div>
      @error('current_password')
        <div class="form-group row">
          <label class="col-lg-2 col-form-label" ></label>
          <div class="col-lg-10">
            <div class="col-lg-12 col-form-label text-danger" >{{ $message }}</div>
          </div>
        </div>
      @enderror
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">New password</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" name="new_password" placeholder="New password">
        </div>
      </div>
      @error('new_password')
        <div class="form-group row">
          <label class="col-lg-2 col-form-label" ></label>
          <div class="col-lg-10">
            <div class="col-lg-12 col-form-label text-danger" >{{ $message }}</div>
          </div>
        </div>
      @enderror
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Confirm password</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" name="new_confirm_password" placeholder="Confirm password">
        </div>
      </div>
      @error('new_confirm_password')
        <div class="form-group row">
          <label class="col-lg-2 col-form-label" ></label>
          <div class="col-lg-10">
            <div class="col-lg-12 col-form-label text-danger" >{{ $message }}</div>
          </div>
        </div>
      @enderror
      <div class="form-group row">
        <div class="col-sm-2"></div>
        <div class="col-sm-10 d-flex justify-content-center">
          <button type="submit" class="btn btn-success">Save change</button>
        </div>
      </div>
      @csrf
    </form>
  </div>
@endsection

@section('jsMyProfile')
  <script type="text/javascript">
    var loadFile = function(event){
      var preview = document.getElementById('preview');
      preview.src = URL.createObjectURL(event.target.files[0])
      $('#preview').show();
    };
  </script>
@endsection
