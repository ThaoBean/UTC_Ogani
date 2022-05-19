@extends('clientPages.master')
@section('content')
@include("clientPages.brand_")
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="https://png.pngtree.com/thumb_back/fh260/back_our/20190619/ourmid/pngtree-fresh-and-elegant-background-cosmetics-banner-material-image_131723.jpg">
          <div class="container">
            <div class="row">
              <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                  <h2>History order</h2>
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
                    <th>ID order</th>
                    <!-- <th>Người nhận</th>
                    <th>Địa chỉ</th> -->
                    <th>Quantity</th>
                    <th>Total price</th>
                    <th>Date order</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($myOrders as $myOrder)
                  <tr>
                    <td>{{base64_encode("Order:".$myOrder->id)}}</td>
                    <td>{{$myOrder->total_quantity}}</td>
                    <td>
                      @if ($myOrder->total_price>499000)
                      {{number_format($myOrder->total_price, 0)}}đ
                      @else
                      {{number_format($myOrder->total_price + 30000, 0)}}đ
                      @endif
                    </td>
                    <td>{{$myOrder->created_at}}</td>
                    <td style="display: flex">                       
                        @if($myOrder->status == "PENDING")
                          <button class="btn btn-danger btn show_confirm">
                            <a href="{{URL::to('/cancel-order/'.$myOrder->id)}}" style="color: white">Cancel order</a>
                          </button>
                        @elseif($myOrder->status == "CANCELED")
                          <button class="btn btn-danger btn show_confirm">
                            Order canceled
                          </button>
                        @endif
                        <button class="btn btn-success btn">
                          <a href="{{URL::to('/order-detail/'.$myOrder->id)}}" style="color: white">View detail</a>
                        </button>
                      </td>
                  </tr>
                  @endforeach              
                </tbody>
                <tfoot>
                  <tr>
                    <th>ID order</th>
                    <th>Quantity</th>
                    <th>Total price</th>
                    <th>Date order</th>
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