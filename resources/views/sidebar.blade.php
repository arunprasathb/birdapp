<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="/images/avatar.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{$admin->name}}</p>
          <i class="fa fa-circle text-success"></i> Online
        </div>
      </div>
      <br>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        
        <li>
          <a href="/admin/dashboard">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li class="treeview {{ Route::currentRouteName() == 'books' ? 'active menu-open' : '' }}">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>Books</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/admin/books/add"><i class="fa fa-circle-o"></i> Add Book</a></li>
            <li><a href="/admin/books"><i class="fa fa-circle-o"></i> Books list</a></li>
          </ul>
        </li>
        
        <li class="treeview {{ Route::currentRouteName() == 'users' ? 'active menu-open' : '' }}">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li><a href="/admin/users/add"><i class="fa fa-circle-o"></i> Add User</a></li>
            <li><a href="/admin/users"><i class="fa fa-circle-o"></i> Users List</a></li>
          </ul>
        </li>
        @if ($admin->role == "1")
        <li class="{{ Route::currentRouteName() == 'settings' ? 'active menu-open' : '' }}">
          <a href="/admin/settings">
            <i class="fa fa-gear"></i>
            <span>Settings</span>
          </a>
        </li>
        @endif
       
        
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>