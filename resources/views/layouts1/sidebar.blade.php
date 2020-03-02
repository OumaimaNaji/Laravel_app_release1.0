<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
            @if(Auth::user()->image != null)
                <img src="{{ asset('avatars').'/'. Auth::user()->image }}" class="img-circle" alt="User Image">
            @else
                <img src="{{ asset("admin/dist/img/avatar5.png") }}" class="img-circle" alt="User Image">
            @endif
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
            <li class=""><a href="{{ route('blog.index') }}"><i class="fa fa-circle-o"></i> Blogs</a></li>
            @if(Auth::user()->role_id == 1)
            <li class=""><a href={{ route('list') }}><i class="fa fa-circle-o"></i> Users</a></li>
            <li class="hidden"><a href="#"><i class="fa fa-circle-o"></i> Roles</a></li>
            @endif
        </li>




      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
