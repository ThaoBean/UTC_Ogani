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
        <li class="breadcrumb-item active"><a href="javascript:void(0)">Users</a></li>
      </ol>
    </div>
  </div>
  <!-- row -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">List Users</h4>
            <div class="table-responsive">
              <table class="table table-striped table-bordered zero-configuration">
                <thead>
                  <tr>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Avatar</th>
                    <th>Role</th>
                    <th>Date join</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($users as $user)
                    <tr>
                      <td>{{$user->name}}</td>
                      <td>{{$user->email}}</td>
                      <td><img src="{{URL::to('storage/images/'.$user->avatar)}}" style="width: 200px; height: 200px;"/></td>
                      <td>
                        @if($user->uType == 'USR')
                          User
                        @else
                          Admin
                        @endif
                      </td>
                      <td>
                      {{$user->created_at}}
                      </td>
                    </tr>
                  @endforeach
                </tbody>
                <tfoot>
                  <tr>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Avatar</th>
                    <th>Role</th>
                    <th>Date join</th>
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
@endsection