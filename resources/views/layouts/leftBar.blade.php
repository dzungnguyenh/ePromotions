<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="https://avatars3.githubusercontent.com/u/12997183?v=3&s=200" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="post" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      <!-- /.search form -->
      @if (Auth::user()->role_id == Config::get('constants.ROLEADMIN'))
        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
          <li class="header">{!! trans('left_bar.titleAdmin') !!}</li>
          <!-- Optionally, you can add icons to the links -->
          <li class="treeview">
            <a href="#"><i class="fa fa-book"></i> <span>{!! trans('left_bar.point') !!}</span>
            </a>
          </li>

          <li class="treeview">
            <a href="#"><i class="fa fa-book"></i> <span>{!! trans('left_bar.user') !!}</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="#">{!! trans('left_bar.viewList') !!}</a></li>
              <li><a href="#">{!! trans('left_bar.createNew') !!}</a></li>
            </ul>
          </li>

          <li class="treeview">
            <a href="#"><i class="fa fa-book"></i> <span>{!! trans('left_bar.bussiness') !!}</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="#">{!! trans('left_bar.viewList') !!}</a></li>
              <li><a href="#">{!! trans('left_bar.createNew') !!}</a></li>
            </ul>
          </li>
        </ul>

      @else

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
          <li class="header">{!! trans('left_bar.titleUser') !!}</li>
          <!-- Optionally, you can add icons to the links -->
          <li class="treeview">
            <a href="#"><i class="fa fa-book"></i> <span>{!! trans('left_bar.point') !!}</span>
            </a>
          </li>

          <li class="treeview">
            <a href="#"><i class="fa fa-book"></i> <span>{!! trans('left_bar.order') !!}</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="#">{!! trans('left_bar.viewList') !!}</a></li>
              <li><a href="#">{!! trans('left_bar.createNew') !!}</a></li>
            </ul>
          </li>

          @if (Auth::user()->role_id == Config::get('constants.ROLEBUSSINESS'))

            <li class="treeview">
              <a href="#"><i class="fa fa-book"></i> <span>{!! trans('left_bar.bussiness') !!}</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#">{!! trans('left_bar.product') !!}</a></li>
                <li><a href="#">{!! trans('left_bar.event') !!}</a></li>
                <li><a href="#">{!! trans('left_bar.promotion') !!}</a></li>
                <li><a href="#">{!! trans('left_bar.order') !!}</a></li>
              </ul>
            </li>
          
          @endif

        </ul>

      @endif
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>