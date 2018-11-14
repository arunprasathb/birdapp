<header class="main-header">

    <!-- Logo -->
    <a href="/admin/" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>{{config('constants.site_name')}}</b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <!-- Notifications: style can be found in dropdown.less -->
          
          <!-- Tasks: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="user"><a href="/admin/settings"><i class="fa fa-gear"></i>Settings</a></li>
          <li class="dropdown user user-menu">
            <a href="/admin/logout" class=""><i class="fa fa-sign-out"></i>Sign out</a>
            <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="/images/avatar.png" class="user-image" alt="User Image">
              <span class="hidden-xs">{{$admin->name}}</span>
            </a> -->
            <!-- <ul class="dropdown-menu">
              <li class="user-header">
                <img src="/images/avatar.png" class="img-circle" alt="User Image">

                <p>
                  {{$admin->name}}
                </p>
              </li>
              @if ($admin->role == '1')
                <div class="pull-left">
                  <a href="/admin/settings" class="btn btn-default btn-flat">settings</a>
                </div>
              @endif
                <div class="pull-right">
                  <a href="/admin/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul> -->
          </li>
          
        </ul>
      </div>

    </nav>
  </header>