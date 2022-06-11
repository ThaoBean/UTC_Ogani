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
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Orders</a></li>
      </ol>
    </div>
  </div>
  <!-- row -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">List orders</h4>
            <div class="table-responsive">
              <table class="table table-striped table-bordered zero-configuration">
                <thead>
                  <tr>
                    <th>Id order</th>
                    <th>Quantity</th>
                    <th>Total price</th>
                    <th>Time place</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($listOrders as $listOrder)
                  <tr>
                    <td>{{base64_encode("Order:".$listOrder->id)}}</td>
                    <td>{{$listOrder->total_quantity}}</td>
                    <td>
                      @if ($listOrder->total_price>499000)
                      {{number_format($listOrder->total_price, 0)}}đ
                      @else
                      {{number_format($listOrder->total_price + 30000, 0)}}đ
                      @endif
                    </td>
                    <td>{{$listOrder->created_at}}</td>
                    <td><span class="badge badge-primary px-2">{{$listOrder->status}}</span></td>
                    </td>
                    <td style="display: flex">                       
                        <button class="btn btn-success btn">
                          <a href="{{URL::to('/admin/order-detail/'.$listOrder->id)}}" style="color: white">Detail</a>
                        </button>
                      </td>
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>Id order</th>
                    <th>Quantity</th>
                    <th>Total price</th>
                    <th>Time place</th>
                    <th>Status</th>
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

@section('cssListCategory')
  <link href="{{asset('assets_admin/plugins/tables/css/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('jsListCategory')
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
              title: `If you delete this, it will be gone forever?.`,
              // text: "If you delete this, it will be gone forever.",
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