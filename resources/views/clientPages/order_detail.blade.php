@extends('clientPages.master')
@section('content')
@include("clientPages.brand_")
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="https://png.pngtree.com/thumb_back/fh260/back_our/20190619/ourmid/pngtree-fresh-and-elegant-background-cosmetics-banner-material-image_131723.jpg">
          <div class="container">
            <div class="row">
              <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                  <h2>Chi tiết đơn hàng</h2>
                </div>
              </div>
            </div>
          </div>
    </section>
    <!-- Breadcrumb Section End -->
    <div class="container" style="margin-top:50px;">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-bordered zero-configuration">
                <thead>
                  <tr>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Quantity item</th>
                    <th>Discount</th>
                    <th>Total Item</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($myOrders as $myOrder)
                  <tr>
                    <td>
                      <img src="{{URL::to('storage/images/'.$myOrder->image)}}" style="width:200px; height:200px;"/>
                    </td>
                    <td>{{$myOrder->product}}</td>
                    <td>
                      {{$myOrder->unit_quantity}}
                    </td>
                    <td>{{number_format($myOrder->unit_discount, 0)}}đ</td>
                    <td>{{number_format($myOrder->unit_price, 0)}}đ</td>
                    <td style="display: flex">                       
                        <form method="POST" action="">
                          <button type="submit" class="btn btn-info btn">Product reviews</button>
                          @csrf
                        </form>
                      </td>
                  </tr>
                  @endforeach              
                </tbody>
                <tfoot>
                  <tr>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Quantity item</th>
                    <th>Discount</th>
                    <th>Total Item</th>
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
@endsection

@section('cssListHistoryOrder')
  <link href="{{asset('assets_admin/plugins/tables/css/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('jsListHistoryOrder')
  <script src="{{asset('assets_admin/plugins/tables/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('assets_admin/plugins/tables/js/datatable/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('assets_admin/plugins/tables/js/datatable-init/datatable-basic.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
@endsection