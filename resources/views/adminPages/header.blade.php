<!--**********************************
  Nav header start
  ***********************************-->
  <div class="nav-header">
  <div style="background:white;" class="brand-logo">
    <a href="{{URL::to('/admin')}}">
    <b class="logo-abbr"><img src="{{asset('assets_admin/images/logo.png')}}" alt=""> </b>
    <span class="logo-compact"><img src="{{asset('assets_admin/images/logo-compact.png')}}" alt=""></span>
    <span class="brand-title">
    <img  src="{{asset('img/logo.png')}}" alt="">
    </span>
    </a>
  </div>
</div>
<!--**********************************
  Nav header end
  ***********************************-->
<!--**********************************
  Header start
  ***********************************-->
<div class="header">
  <div class="header-content clearfix">
    <div class="nav-control">
      <div class="hamburger">
        <span class="toggle-icon"><i class="icon-menu"></i></span>
      </div>
    </div>
    <div class="header-right">
      <ul class="clearfix">
        <!-- <li class="icons dropdown">
          <a href="javascript:void(0)" data-toggle="dropdown">
          <i class="mdi mdi-email-outline"></i>
          <span class="badge badge-pill gradient-1">3</span>
          </a>
          <div class="drop-down animated fadeIn dropdown-menu">
            <div class="dropdown-content-heading d-flex justify-content-between">
              <span class="">3 New Messages</span>  
              <a href="javascript:void()" class="d-inline-block">
              <span class="badge badge-pill gradient-1">3</span>
              </a>
            </div>
            <div class="dropdown-content-body">
              <ul>
                <li class="notification-unread">
                  <a href="javascript:void()">
                    <img class="float-left mr-3 avatar-img" src="assets_admin/images/avatar/1.jpg" alt="">
                    <div class="notification-content">
                      <div class="notification-heading">Saiful Islam</div>
                      <div class="notification-timestamp">08 Hours ago</div>
                      <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                    </div>
                  </a>
                </li>
                <li class="notification-unread">
                  <a href="javascript:void()">
                    <img class="float-left mr-3 avatar-img" src="assets_admin/images/avatar/2.jpg" alt="">
                    <div class="notification-content">
                      <div class="notification-heading">Adam Smith</div>
                      <div class="notification-timestamp">08 Hours ago</div>
                      <div class="notification-text">Can you do me a favour?</div>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="javascript:void()">
                    <img class="float-left mr-3 avatar-img" src="assets_admin/images/avatar/3.jpg" alt="">
                    <div class="notification-content">
                      <div class="notification-heading">Barak Obama</div>
                      <div class="notification-timestamp">08 Hours ago</div>
                      <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="javascript:void()">
                    <img class="float-left mr-3 avatar-img" src="assets_admin/images/avatar/4.jpg" alt="">
                    <div class="notification-content">
                      <div class="notification-heading">Hilari Clinton</div>
                      <div class="notification-timestamp">08 Hours ago</div>
                      <div class="notification-text">Hello</div>
                    </div>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </li>
        <li class="icons dropdown">
          <a href="javascript:void(0)" data-toggle="dropdown">
          <i class="mdi mdi-bell-outline"></i>
          <span class="badge badge-pill gradient-2">3</span>
          </a>
          <div class="drop-down animated fadeIn dropdown-menu dropdown-notfication">
            <div class="dropdown-content-heading d-flex justify-content-between">
              <span class="">2 New Notifications</span>  
              <a href="javascript:void()" class="d-inline-block">
              <span class="badge badge-pill gradient-2">5</span>
              </a>
            </div>
            <div class="dropdown-content-body">
              <ul>
                <li>
                  <a href="javascript:void()">
                    <span class="mr-3 avatar-icon bg-success-lighten-2"><i class="icon-present"></i></span>
                    <div class="notification-content">
                      <h6 class="notification-heading">Events near you</h6>
                      <span class="notification-text">Within next 5 days</span> 
                    </div>
                  </a>
                </li>
                <li>
                  <a href="javascript:void()">
                    <span class="mr-3 avatar-icon bg-danger-lighten-2"><i class="icon-present"></i></span>
                    <div class="notification-content">
                      <h6 class="notification-heading">Event Started</h6>
                      <span class="notification-text">One hour ago</span> 
                    </div>
                  </a>
                </li>
                <li>
                  <a href="javascript:void()">
                    <span class="mr-3 avatar-icon bg-success-lighten-2"><i class="icon-present"></i></span>
                    <div class="notification-content">
                      <h6 class="notification-heading">Event Ended Successfully</h6>
                      <span class="notification-text">One hour ago</span>
                    </div>
                  </a>
                </li>
                <li>
                  <a href="javascript:void()">
                    <span class="mr-3 avatar-icon bg-danger-lighten-2"><i class="icon-present"></i></span>
                    <div class="notification-content">
                      <h6 class="notification-heading">Events to Join</h6>
                      <span class="notification-text">After two days</span> 
                    </div>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </li> -->
        @if(Auth::check())
        <li class="icons dropdown d-none d-md-flex">
          <a href="javascript:void(0)" class="log-user"  data-toggle="dropdown">
          <span>{{Auth::user()->name}}</span>
          </a>
        </li>
        <li class="icons dropdown">
          <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
            <span class="activity active"></span>
            <img src="{{URL::to('storage/images/'.Auth::user()->avatar)}}" height="40" width="40" alt="">
          </div>
          <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
            <div class="dropdown-content-body">
              <ul>
                <li>
                  <a href="{{URL::to('/my-profile')}}"><i class="icon-user"></i> <span>Profile</span></a>
                </li>
                <li>
                  <a href="javascript:void()">
                    <i class="icon-envelope-open"></i> <span>Inbox</span> 
                    <div class="badge gradient-3 badge-pill gradient-1">3</div>
                  </a>
                </li>
                <hr class="my-2">
                <li><a href="{{URL::to('/logout')}}"><i class="icon-key"></i> <span>Logout</span></a></li>
              </ul>
            </div>
          </div>
        </li>
        @endif
      </ul>
    </div>
  </div>
</div>
<!--**********************************
  Header end ti-comment-alt
  ***********************************-->