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
  <!-- Info Order   -->
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title" style="margin-bottom:30px;">Thông tin đặt hàng</h4>
            <div class="form-group row">
              <label class="col-lg-2 col-form-label">Người nhận: </label>
              <div class="col-lg-8">
                <div>{{$orderInfo->receiver}}</div>
              </div>
            </div>
            <!-- End -->
            <!-- Short-desc -->
            <div class="form-group row">
              <label class="col-lg-2 col-form-label">Số điện thoại: </label>
              <div class="col-lg-8">
                <div>{{$orderInfo->phone_receiver}}</div>
              </div>
            </div>
            <!-- End -->
            <!-- Description -->
            <div class="form-group row">
              <label class="col-lg-2 col-form-label">Địa chỉ: </label>
              <div class="col-lg-8">
                <div>{{$orderInfo->address_receiver}}</div>
              </div>
            </div>
            <!-- End -->
            <!-- Description -->
            <div class="form-group row">
              <label class="col-lg-2 col-form-label">Tiền hàng: </label>
              <div class="col-lg-8">
                <div>{{number_format($orderInfo->total_price, 0)}}đ</div>
              </div>
            </div>
            <!-- End -->
            <!-- Description -->
            <div class="form-group row">
              <label class="col-lg-2 col-form-label">Phí vận chuyển: </label>
              <div class="col-lg-8">
                <div>{{number_format($orderInfo->fee_shipping, 0)}}đ</div>
              </div>
            </div>
            <!-- End -->
            <div class="form-group row">
              <label class="col-lg-2 col-form-label">Tổng tiền: </label>
              <div class="col-lg-8">
                <div>{{number_format($orderInfo->fee_shipping + $orderInfo->total_price, 0)}}đ</div>
              </div>
            </div>
            <!-- End -->
            <div class="form-group row">
              <label class="col-lg-2 col-form-label">Trạng thái đơn hàng: </label>
              <div class="col-lg-8">
                <div><span class="badge badge-primary px-2">{{$orderInfo->status}}</span></div>
              </div>
            </div>
            <!-- Price -->
            <div class="form-group row">
              <label class="col-lg-2 col-form-label" >Phương thức thanh toán: </label>
              <div class="col-lg-8">
                @if($orderInfo->payment == 1)
                <div>Thanh toán khi nhận hàng</div>
                @else
                <div>Paypal</div>
                @endif
              </div>
            </div>
            <!-- End -->
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--End Info Order  -->

  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Chi tiết đơn hàng</h4>
            <div class="table-responsive">
              <table class="table table-striped table-bordered zero-configuration">
                <thead>
                  <tr>
                    <th>Ảnh</th>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giảm giá</th>
                    <th>Tổng tiền</th>
                    <!-- <th>Action</th> -->
                  </tr>
                </thead>
                <tbody>
                  @foreach($listOrdersDetail as $listOrder)
                  <tr>
                    <td>
                      <img src="{{URL::to('storage/images/'.$listOrder->image)}}" style="width:200px; height:200px;"/>
                    </td>
                    <td>{{$listOrder->product}}</td>
                    <td>
                      {{$listOrder->unit_quantity}}
                    </td>
                    <td>{{number_format($listOrder->unit_discount, 0)}}đ</td>
                    <td>{{number_format($listOrder->unit_price, 0)}}đ</td>
                    <!-- <td style="display: flex">                       
                        <form method="POST" action="">
                          <button type="submit" class="btn btn-info btn">Đánh giá sản phẩm</button>
                          @csrf
                        </form>
                      </td> -->
                  </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>Ảnh</th>
                    <th>Sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Giảm giá</th>
                    <th>Tổng tiền</th>
                    <!-- <th>Action</th> -->
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

  <!-- Change Status Order -->
  @if($orderInfo->status !== "CANCELED" || $orderInfo->status !== "REJECT")
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title" style="margin-bottom:30px;">Cập nhật trạng thái đơn hàng</h4>
            <div class="form-group row">
              <label class="col-lg-2 col-form-label">Trạng thái: </label>
              <div class="col-lg-10">
                <form method="post" action="{{URL::to('/admin/update-status-order/'.$orderInfo->id)}}" style="display:flex; align-items:center;">
                  <div class="col-lg-4">
                    <select class="form-control" id="val-skill" name="status">
                      @if($orderInfo->status == "PENDING")
                      <option {{$orderInfo->status == "PENDING" ? ' selected' : ''}} value="PENDING">Chuẩn bị hàng</option>
                      <option {{$orderInfo->status == "REJECT" ? ' selected' : ''}} value="REJECT">Từ chối</option>
                      <option {{$orderInfo->status == "DELIVERING" ? ' selected' : ''}} value="DELIVERING">Đang vận chuyển</option>
                      @elseif($orderInfo->status == "DELIVERING")
                      <option {{$orderInfo->status == "DELIVERING" ? ' selected' : ''}} value="DELIVERING">Đang vận chuyển</option>
                      <option {{$orderInfo->status == "DELIVERED" ? ' selected' : ''}} value="DELIVERED">Đã giao</option>
                      @elseif($orderInfo->status == "DELIVERED")
                      <option {{$orderInfo->status == "DELIVERED" ? ' selected' : ''}} value="DELIVERED">Đã giao</option>
                      @endif
                    </select>
                  </div>
                  <div class="col-lg-4">
                    <!-- <div class="col-lg-10 ml-auto"> -->
                      <button type="submit" class="btn btn-primary">Cập nhật</button>
                    <!-- </div> -->
                  </div>
                  @csrf
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif
  <!-- End Change Status Order -->
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
              title: `Bạn chắc chắn muốn xóa bản ghi này?`,
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