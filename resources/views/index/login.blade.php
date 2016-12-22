<!DOCTYPE html>
<html lang="en-IN">
<head>
  <meta charset="utf-8">
  <title></title>
  <link href='http://fonts.googleapis.com/css?family=Ropa+Sans' rel='stylesheet'>
  <link rel="stylesheet" href="http://localhost/css/style_login.css">
  <script src="http://localhost/js/login.js" type="text/javascript" charset="utf-8" async defer></script>
  <!-- Scripts -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{asset('/bower_components/AdminLTE/bootstrap/css/bootstrap.min.css')}}">
  <script type="text/javascript" src="{{asset('/bower_components/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
  <script src="{{asset('/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js')}}"></script>
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel='stylesheet'>
  <link rel="stylesheet" type="text/css" href="/css/style.css">
</head>
<body>
  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#myPage">{!! trans('header.title_E') !!}</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#about">{!! trans('header.about') !!}</a></li>
          <li><a href="#promotion">{!! trans('header.promotion') !!}</a></li>
          <li><a href="#product">{!! trans('header.product') !!}</a></li>
          <li><a href="#event">{!! trans('header.event') !!}</a></li>
          <li><a href="#contact">{!! trans('footer.contact') !!}</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <div id="login-form">
    <input type="radio" checked id="login" name="switch" class="hide">
    <input type="radio" id="signup" name="switch" class="hide">
    <div>
      <ul class="form-header">
        <li><label for="login"><i class="fa fa-lock"></i>{!! trans('login_trans.login') !!}<label for="login"></li>
        <li><label for="signup"><i class="fa fa-credit-card"></i>{!! trans('login_trans.register') !!}</label></li>
      </ul>
    </div>
    <div class="section-out">

      <!-- Form Login -->
      <section class="login-section">
        <div class="login">
          <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
            {{csrf_field()}}
            <ul class="ul-list">
              <li>
                <input type="email" required class="input" name="email" placeholder="{!! trans('login_trans.your_mail') !!}"/>
                <span class="icon"><i class="glyphicon glyphicon-envelope"></i></span>
              </li>
              <li>
                <input type="password" name="password" required class="input" placeholder="{!! trans('login_trans.password') !!}"/>
                <span class="icon"><i class="fa fa-lock"></i></span>
              </li>
              <li>
                <span class="remember"><input type="checkbox" id="check">
                  <label for="check">{!! trans('login_trans.remember_me') !!}</label>
                </span>
                <span class="remember"><a href="{{ url('/password/reset') }}"">{!! trans('login_trans.forget') !!}</a>
                </span>
              </li>
              <li>
                <input type="submit" value="SIGN IN" class="btn">
              </li>
            </ul>
          </form>
        </div>
        <div class="social-login">{!! trans('login_trans.social_network') !!} &nbsp;
          <a href="" class="fb"><i class="fa fa-facebook"></i></a>
          <a href="" class="tw"><i class="fa fa-twitter"></i></a>
          <a href="" class="gp"><i class="fa fa-google-plus"></i></a>
        </div>
      </section>

      <!-- Form register -->
      <section class="signup-section">
        <div class="login">
          <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
            {{ csrf_field() }}
            <ul class="ul-list">
              <li>
                <input id="name" type="text" required class="input" name="name" required placeholder="{!! trans('login_trans.full_name') !!}"/>
                <span class="icon"><i class="fa fa-user"></i></span>
              </li>
              <li>
                <input id="email" type="email" required class="input" name="email" placeholder="{!! trans('login_trans.your_mail') !!}"/>
                <span class="icon"><i class="glyphicon glyphicon-envelope"></i></span>
              </li>
              <li>
                <input id="password" type="password" required class="input" name="password" placeholder="{!! trans('login_trans.password') !!}"/>
                <span class="icon"><i class="fa fa-lock"></i></span>
              </li>
              <li>
                <input id="password-confirm" type="password" required class="input" name="password_confirmation" placeholder="{!! trans('login_trans.confirm_pass') !!}"/>
                <span class="icon"><i class="fa fa-lock"></i></span>
              </li>
              <li>
                <input type="checkbox" id="check1">
                <label for="check1">{!! trans('login_trans.condition') !!}</label>
              </li>
              <li>
                <input type="submit" value="SIGN UP" class="btn">
              </li>
            </ul>
          </form>
        </div>
      </section>
    </div>
  </div>
</body>
</html>