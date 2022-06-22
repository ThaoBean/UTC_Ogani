@extends('clientPages.master')
@section('content')
@include("clientPages.brand_")
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="https://png.pngtree.com/thumb_back/fh260/back_our/20190619/ourmid/pngtree-fresh-and-elegant-background-cosmetics-banner-material-image_131723.jpg">
          <div class="container">
            <div class="row">
              <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                  <h2>Order Detail</h2>
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
                      @if($orderStatus == "DELIVERED")
                        <th>Action</th>
                      @endif
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($myOrders as $myOrder)
                    <tr>
                      <td>
                        <img src="{{URL::to('storage/images/'.$myOrder->image)}}" style="width:200px; height:200px;"/>
                      </td>
                      <td><a style="color: #212529;" href="{{URL::to('/detail-product/'.$myOrder->product_id)}}">{{$myOrder->product}}</a></td>
                      <td >
                        {{$myOrder->unit_quantity}}
                      </td>
                      <td>{{number_format($myOrder->unit_discount, 0)}}đ</td>
                      <td>{{number_format($myOrder->unit_price, 0)}}đ</td>
                      @if($orderStatus == "DELIVERED")
                      <td style="display: flex">                       
                          <button type="button" data-item="{{$myOrder->product_id}}/{{$myOrder->order_details_id}}" class="btn btn-info btn btn-block" data-toggle="modal" data-target="#exampleModal">Product review</button>
                          <!-- popup -->
                          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Review product</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  <form method="post" id="sm_form">
                                    <div class="rating">
                                          <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                                          <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                                          <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                                          <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                                          <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Description</label>
                                        <textarea class="form-control" name="review" id="exampleFormControlTextarea1" rows="5"></textarea>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-primary" id="save" >Save changes</button>
                                    </div>
                                    @csrf
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </td>
                      @endif
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
                      @if($orderStatus == "DELIVERED")
                        <th>Action</th>
                      @endif
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
  <link href="{{asset('css/review.css')}}" rel="stylesheet">
@endsection

@section('jsListHistoryOrder')
  <script src="{{asset('assets_admin/plugins/tables/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('assets_admin/plugins/tables/js/datatable/dataTables.bootstrap4.min.js')}}"></script>
  <script src="{{asset('assets_admin/plugins/tables/js/datatable-init/datatable-basic.min.js')}}"></script>
  <script type="text/javascript">
    $(document).on("click", ".btn-block", function () {
      var id= $(this).attr('data-item');
      $("#sm_form").attr("action","/review-product/"+id)
    });

    $('#save').click(function(event) {
      form.submit();
    });
  </script>
@endsection