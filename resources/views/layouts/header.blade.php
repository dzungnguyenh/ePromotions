<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{!! trans('header.e_promotions') !!}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{asset('/bower_components/AdminLTE/bootstrap/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('/bower_components/AdminLTE/dist/css/AdminLTE.min.css')}}">
  <!-- Skin -->
  <link rel="stylesheet" href="{{asset('/bower_components/AdminLTE/dist/css/skins/skin-blue.min.css')}}">
  <link href="https://fonts.googleapis.com/css?family=Architects+Daughter" rel="stylesheet">
  <!-- jquery -->
  <script type="text/javascript" src="{{asset('/bower_components/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
  <!-- customer -->
  <link rel="stylesheet" href="{{asset('/css/style_admin.css')}}">
  <link rel="stylesheet" href="{{asset('/css/product.css')}}">
  <link rel="stylesheet" href="{{asset('/css/promotion.css')}}">
  <link rel="stylesheet" href="{{asset('/css/user_order_index.css')}}">

  <script src="http://code.jquery.com/jquery-2.1.4.min.js"></script><script type="text/javascript" var_1="true" var_2="false" var_3="false" var_4="80" src="https://static1.fshare.vn/js/flies-obj-2.1.js?v=a5a98a85"></script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">{!! trans('header.e_p') !!}</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">{!! trans('header.e_promotions') !!}</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only"></span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="{{ config('image.path_avatar')}}/{{Auth::user()->avatar }}" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="{{ config('image.path_avatar') }}/{{ Auth::user()->avatar }}" class="img-circle" alt="User Image">
                <p>
                  {{ Auth::user()->name }}
                </p>
              </li>
              <li class="user-footer">
                <div class="pull-left">
                  <a href="/user/{{ Auth::user()->id }}/edit" class="btn btn-default btn-flat"><span class="glyphicon glyphicon-user"></span>{!! trans('header.profile') !!}</a>
                </div>
                <div class="pull-right">
                  <form id="logout-form" action="{{ url('/logout') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="submit" id="logout" name="" value="{!! trans('header.sign_out') !!}">
                  </form>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
