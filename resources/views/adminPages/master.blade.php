<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Admin</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets_admin/images/favicon.png')}}">
    <!-- Pignose Calender -->
    <link href="{{asset('assets_admin/plugins/pg-calendar/css/pignose.calendar.min.css')}}" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="{{asset('assets_admin/plugins/chartist/css/chartist.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets_admin/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css')}}">
    <!-- Custom Stylesheet -->
    <link href="{{asset('assets_admin/css/style.css')}}" rel="stylesheet">
    @yield('cssListBrand')
    @yield('cssListCategory')
    @yield('cssCreateProduct')
    @yield('cssListProduct')
  </head>
  <body>
    <!--*******************
      Preloader start
      ********************-->
    <div id="preloader">
      <div class="loader">
        <svg class="circular" viewBox="25 25 50 50">
          <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
        </svg>
      </div>
    </div>
    <!--*******************
      Preloader end
      ********************-->
    <!--**********************************
      Main wrapper start
      ***********************************-->
    <div id="main-wrapper">
      @include('adminPages.header')
      <!--**********************************
        Sidebar start
        ***********************************-->
      <div class="nk-sidebar">
        <div class="nk-nav-scroll">
          <ul class="metismenu" id="menu">
            <li class="nav-label">Dashboard</li>
            <li>
              <a href="/admin" aria-expanded="false">
              <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
              </a>
            </li>
            <li class="mega-menu mega-menu-sm">
              <a class="has-arrow" href="javascript:void()" aria-expanded="false">
              <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Products</span>
              </a>
              <ul aria-expanded="false">
                <li><a href="{{ url('admin/list-product')}}">List products</a></li>
                <li><a href="{{ url('admin/create-product')}}">Add product</a></li>
              </ul>
            </li>
            <li>
              <a class="has-arrow" href="javascript:void()" aria-expanded="false">
              <i class="icon-envelope menu-icon"></i> <span class="nav-text">Brands</span>
              </a>
              <ul aria-expanded="false">
                <li><a href="{{ url('admin/list-brand')}}">List brands</a></li>
                <li><a href="{{ url('admin/create-brand')}}">Add brand</a></li>
              </ul>
            </li>
            <li>
              <a class="has-arrow" href="javascript:void()" aria-expanded="false">
              <i class="icon-screen-tablet menu-icon"></i><span class="nav-text">Categories</span>
              </a>
              <ul aria-expanded="false">
                <li><a href="{{ url('admin/list-category')}}">List categories</a></li>
                <li><a href="{{ url('admin/create-category')}}">Add category</a></li>
              </ul>
            </li>
            <li>
              <a class="has-arrow" href="javascript:void()" aria-expanded="false">
              <i class="icon-graph menu-icon"></i> <span class="nav-text">Order</span>
              </a>
              <ul aria-expanded="false">
                <li><a href="{{ url('/admin/list-orders')}}">List orders</a></li>
                <!-- <li><a href="{{ url('/admin/list-orders')}}">Danh sách đơn hàng mới</a></li> -->
              </ul>
            </li>
            <li>
              <a class="has-arrow" href="javascript:void()" aria-expanded="false">
              <i class="icon-note menu-icon"></i><span class="nav-text">Users</span>
              </a>
              <ul aria-expanded="false">
                <li>
                  <a href="{{ url('/admin/list-users')}}" aria-expanded="false">
                  <i class="icon-badge menu-icon"></i><span class="nav-text">Users</span>
                  </a>
                </li>
              </ul>
            </li>
            <li>
              <a href="{{URL::to('/')}}" aria-expanded="false">
                <i class="icon-badge menu-icon"></i><span class="nav-text">Back to website</span>
              </a>
            </li>
            <!-- <li class="nav-label">UI Components</li>
            <li>
              <a class="has-arrow" href="javascript:void()" aria-expanded="false">
              <i class="icon-grid menu-icon"></i><span class="nav-text">UI Components</span>
              </a>
              <ul aria-expanded="false">
                <li><a href="./ui-accordion.html">Accordion</a></li>
                <li><a href="./ui-alert.html">Alert</a></li>
                <li><a href="./ui-badge.html">Badge</a></li>
                <li><a href="./ui-button.html">Button</a></li>
                <li><a href="./ui-button-group.html">Button Group</a></li>
                <li><a href="./ui-cards.html">Cards</a></li>
                <li><a href="./ui-carousel.html">Carousel</a></li>
                <li><a href="./ui-dropdown.html">Dropdown</a></li>
                <li><a href="./ui-list-group.html">List Group</a></li>
                <li><a href="./ui-media-object.html">Media Object</a></li>
                <li><a href="./ui-modal.html">Modal</a></li>
                <li><a href="./ui-pagination.html">Pagination</a></li>
                <li><a href="./ui-popover.html">Popover</a></li>
                <li><a href="./ui-progressbar.html">Progressbar</a></li>
                <li><a href="./ui-tab.html">Tab</a></li>
                <li><a href="./ui-typography.html">Typography</a></li>
                <li><a href="./uc-nestedable.html">Nestedable</a></li>
                <li><a href="./uc-noui-slider.html">Noui Slider</a></li>
                <li><a href="./uc-sweetalert.html">Sweet Alert</a></li>
                <li><a href="./uc-toastr.html">Toastr</a></li>
              </ul>
            </li>
            <li>
              <a href="widgets.html" aria-expanded="false">
              <i class="icon-badge menu-icon"></i><span class="nav-text">Widget</span>
              </a>
            </li>
            <li class="nav-label">Forms</li>
            <li>
              <a class="has-arrow" href="javascript:void()" aria-expanded="false">
              <i class="icon-note menu-icon"></i><span class="nav-text">Forms</span>
              </a>
              <ul aria-expanded="false">
                <li><a href="./form-basic.html">Basic Form</a></li>
                <li><a href="./form-validation.html">Form Validation</a></li>
                <li><a href="./form-step.html">Step Form</a></li>
                <li><a href="./form-editor.html">Editor</a></li>
                <li><a href="./form-picker.html">Picker</a></li>
              </ul>
            </li>
            <li class="nav-label">Table</li>
            <li>
              <a class="has-arrow" href="javascript:void()" aria-expanded="false">
              <i class="icon-menu menu-icon"></i><span class="nav-text">Table</span>
              </a>
              <ul aria-expanded="false">
                <li><a href="./table-basic.html" aria-expanded="false">Basic Table</a></li>
                <li><a href="./table-datatable.html" aria-expanded="false">Data Table</a></li>
              </ul>
            </li>
            <li class="nav-label">Pages</li>
            <li>
              <a class="has-arrow" href="javascript:void()" aria-expanded="false">
              <i class="icon-notebook menu-icon"></i><span class="nav-text">Pages</span>
              </a>
              <ul aria-expanded="false">
                <li><a href="./page-login.html">Login</a></li>
                <li><a href="./page-register.html">Register</a></li>
                <li><a href="./page-lock.html">Lock Screen</a></li>
                <li>
                  <a class="has-arrow" href="javascript:void()" aria-expanded="false">Error</a>
                  <ul aria-expanded="false">
                    <li><a href="./page-error-404.html">Error 404</a></li>
                    <li><a href="./page-error-403.html">Error 403</a></li>
                    <li><a href="./page-error-400.html">Error 400</a></li>
                    <li><a href="./page-error-500.html">Error 500</a></li>
                    <li><a href="./page-error-503.html">Error 503</a></li>
                  </ul>
                </li>
              </ul>
            </li> -->
          </ul>
        </div>
      </div>
      <!--**********************************
        Sidebar end
        ***********************************-->
      @yield('contentAdmin')
      <!--**********************************
        Footer start
        ***********************************-->
      <div class="footer">
        <div class="copyright">
          <p>Copyright &copy; Designed & Developed by ThaoDo</p>
        </div>
      </div>
      <!--**********************************
        Footer end
        ***********************************-->
    </div>
    <!--**********************************
      Main wrapper end
      ***********************************-->
    <!--**********************************
      Scripts
      ***********************************-->
    <script src="{{asset('assets_admin/plugins/common/common.min.js')}}"></script>
    <script src="{{asset('assets_admin/js/custom.min.js')}}"></script>
    <script src="{{asset('assets_admin/js/settings.js')}}"></script>
    <script src="{{asset('assets_admin/js/gleek.js')}}"></script>
    <script src="{{asset('assets_admin/js/styleSwitcher.js')}}"></script>
    <!-- Chartjs -->
    <script src="{{asset('assets_admin/plugins/chart.js/Chart.bundle.min.js')}}"></script>
    <!-- Circle progress -->
    <script src="{{asset('assets_admin/plugins/circle-progress/circle-progress.min.js')}}"></script>
    <!-- Datamap -->
    <script src="{{asset('assets_admin/plugins/d3v3/index.js')}}"></script>
    <script src="{{asset('assets_admin/plugins/topojson/topojson.min.js')}}"></script>
    <script src="{{asset('assets_admin/plugins/datamaps/datamaps.world.min.js')}}"></script>
    <!-- Morrisjs -->
    <script src="{{asset('assets_admin/plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('assets_admin/plugins/morris/morris.min.js')}}"></script>
    <!-- Pignose Calender -->
    <script src="{{asset('assets_admin/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('assets_admin/plugins/pg-calendar/js/pignose.calendar.min.js')}}"></script>
    <!-- ChartistJS -->
    <script src="{{asset('assets_admin/plugins/chartist/js/chartist.min.js')}}"></script>
    <script src="{{asset('assets_admin/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js')}}"></script>
    <script src="{{asset('assets_admin/js/dashboard/dashboard-1.js')}}"></script>
    @yield('jsCreateBrand')
    @yield('jsListBrand')
    @yield('jsCreateCategory')
    @yield('jsListCategory')
    @yield('jsCreateProduct')
    @yield('jsListProduct')
  </body>
</html>