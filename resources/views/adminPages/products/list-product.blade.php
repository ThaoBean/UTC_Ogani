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
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Danh mục</a></li>
      </ol>
    </div>
  </div>
  <!-- row -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Danh sách danh mục</h4>
            <div class="table-responsive">
              <table class="table table-striped table-bordered zero-configuration">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Tên sản phẩm</th>
                    <th>Ảnh</th>
                    <th>Giá bán</th>
                    <th>Giảm giá</th>
                    <th>Số lượng</th>
                    <th>Hot</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($products as $product)
                    <tr>
                      <td>{{$product->id}}</td>
                      <td>{{$product->name}}</td>
                      <td><img src="{{URL::to('storage/images/'.$product->image)}}" style="width:200px; height:200px;"/></td>
                      <td>{{number_format($product->price, 0)}}đ</td>
                      <td>{{$product->discount}}%</td>
                      <td>{{$product->quantity}}</td>
                      <th><input type="checkbox" name="featured" {{$product->featured == 1 ? 'checked' : ''}} ></th>
                      <td style="display: flex">
                        <button class="btn btn-success btn">
                          <a href="{{URL::to('/admin/show-product/'.$product->id)}}" style="color: white">Chi tiết</a>
                        </button>
                        <button class="btn btn-info btn">
                          <a href="{{URL::to('/admin/edit-product/'.$product->id)}}" style="color: white">Chỉnh sửa</a>
                        </button>
                        <form method="POST" action="{{URL::to('/admin/delete-product/'.$product->id)}}">
                          <button type="submit" class="btn btn-danger btn show_confirm">Xóa</button>
                          @csrf
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>Id</th>
                    <th>Tên sản phẩm</th>
                    <th>Ảnh</th>
                    <th>Giá bán</th>
                    <th>Giảm giá</th>
                    <th>Số lượng</th>
                    <th>Hot</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
              </table>
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

@section('cssListProduct')
  <link href="{{asset('assets_admin/plugins/tables/css/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('jsListProduct')
  <script src="{{asset('assets_admin/plugins/tables/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('assets_admin/plugins/tables/js/datatable/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('assets_admin/plugins/tables/js/datatable-init/datatable-basic.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
  <script type="text/javascript">
    $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Bạn chắc chắn muốn xóa bản ghi này?`,
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });
  </script>
@endsection