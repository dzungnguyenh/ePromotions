<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        @if(!empty(Auth::user()->avatar))
          <img src="{{ config('image.path_avatar')}}/{{Auth::user()->avatar }}" class="img-circle avatar" id="output">
        @else
          <img src="{{ config('image.path_avatar')}}/avatar-default.png" class="img-circle avatar">
        @endif
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
      <li class="header">{!! trans('left_bar.title_admin') !!}</li>
      <!-- Optionally, you can add icons to the links -->
      <li class="treeview">
        <a href="#"><i class="fa fa-book"></i> <span>{!! trans('left_bar.point') !!}</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{!! url('admin/point') !!}">{!! trans('left_bar.view_list') !!}</a></li>
          <li><a href="{!! url('admin/point/create') !!}">{!! trans('left_bar.create_new') !!}</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href=""><i class="glyphicon glyphicon-user"></i> <span>{!! trans('left_bar.user') !!}</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{!! url('admin/users') !!}">{!! trans('left_bar.view_list') !!}</a></li>
      </ul>

      <li class="treeview">
        <a href="#"><i class="glyphicon glyphicon-home"></i> <span>{!! trans('left_bar.bussiness') !!}</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{!! url('admin/business') !!}">{!! trans('left_bar.view_list') !!}</a></li>
          <li><a href="#">{!! trans('left_bar.create_new') !!}</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#"><i class="fa fa-credit-card"></i> <span>{!! trans('left_bar.voucher') !!}</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{!! url('admin/voucher') !!}">{!! trans('left_bar.view_list') !!}</a></li>
          <li><a href="{!! url('admin/voucher/create') !!}">{!! trans('left_bar.create_new') !!}</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#"><i class="fa fa-table"></i> <span>{!! trans('left_bar.category') !!}</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{!! url('admin/category') !!}">{!! trans('left_bar.view_list') !!}</a></li>
          <li><a href="{!! url('admin/category/create') !!}">{!! trans('left_bar.create_new') !!}</a></li>
        </ul>
      </li>

      <li class="treeview">
        <a href="#"><i class="fa fa-list"></i> <span>{!! trans('left_bar.block_user') !!}</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{!! url('admin/user/block-user') !!}">{!! trans('left_bar.view_list') !!}</a></li>
        </ul>
      </li>

    </ul>

    @else

    <!-- Sidebar Menu -->
    <ul class="sidebar-menu">
      <li class="header">{!! trans('left_bar.title_user') !!}</li>
      <!-- Optionally, you can add icons to the links -->
      <li class="treeview">
        <a href="#"><i class="fa fa-book"></i> <span>{!! trans('left_bar.point') !!}</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="#">
          {!! trans('label.point') !!}
          {!! Auth::user()->point !!}
          </a></li>
          </ul>
      </li>

      <li class="treeview">
        <a href="{{route('order.index')}}"><i class="fa fa-book"></i> <span>{!! trans('left_bar.order') !!}</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>

      </li>

      <li class="treeview">
        <a href="#"><i class="glyphicon glyphicon-info-sign"></i> <span>{!! trans('left_bar.history') !!}</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('user.history.voted')}}">{!! trans('left_bar.voted') !!}</a></li>
          <li><a href="{{route('history-join-event')}}">{!! trans('left_bar.join_event') !!}</a></li>
        </ul>
      </li>

      @if (Auth::user()->role_id == Config::get('constants.ROLEBUSSINESS'))

      <li class="treeview">
        <a href="#"><i class="glyphicon glyphicon-home"></i> <span>{!! trans('left_bar.bussiness') !!}</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('product.index')}}">{!! trans('left_bar.product') !!}</a></li>
          <li><a href="{{route('event.index')}}">{!! trans('left_bar.event') !!}</a></li>
          <li><a href="#">{!! trans('left_bar.promotion') !!}</a></li>
          <li><a href="#">{!! trans('left_bar.order') !!}</a></li>
        </ul>
      </li>
      <li class="treeview">
        <a href="#"><i class="glyphicon glyphicon-apple"></i> <span>{!! trans('product.product') !!}</span>
          <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{route('product.create')}}">{!! trans('product.create_product') !!}</a></li>
          <li><a href="{{route('product.index')}}">{!! trans('product.view_product') !!}</a></li>
        </ul>
      </li>
      @endif

    </ul>

    @endif
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>
