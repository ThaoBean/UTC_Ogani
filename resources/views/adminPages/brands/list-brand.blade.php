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
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Brands</a></li>
      </ol>
    </div>
  </div>
  <!-- row -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">List Brands</h4>
            <div class="table-responsive">
              <table class="table table-striped table-bordered zero-configuration">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Brand</th>
                    <th>Created at</th>
                    <th>Updated at</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($brands as $brand)
                    <tr>
                      <td>{{$brand->id}}</td>
                      <td>{{$brand->brand}}</td>
                      <td>{{$brand->created_at}}</td>
                      <td>{{$brand->updated_at}}</td>
                      <td style="display: flex">
                        <button class="btn btn-info btn"><a href="{{URL::to('/admin/edit-brand/'.$brand->id)}}" style="color: white">Chỉnh sửa</a></button>
                        <form method="POST" action="{{URL::to('/admin/delete-brand/'.$brand->id)}}">
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
                    <th>Brand</th>
                    <th>Created at</th>
                    <th>Updated at</th>
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

@section('cssListBrand')
  <link href="{{asset('assets_admin/plugins/tables/css/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('jsListBrand')
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
              // text: "Nếu bạn đồng ý, bản ghi này sẽ được ",
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