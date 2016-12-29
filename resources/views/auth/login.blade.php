<!DOCTYPE html>
<html lang="en-IN">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href='http://fonts.googleapis.com/css?family=Ropa+Sans' rel='stylesheet'>
    <link rel="stylesheet" href="{{asset('/css/style_login.css')}}">
    <script src="{{asset('/js/login.js')}}" type="text/javascript" charset="utf-8" async defer></script>
    <!-- Scripts -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('/bower_components/AdminLTE/bootstrap/css/bootstrap.min.css')}}">
    <script type="text/javascript" src="{{asset('/bower_components/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
    <script src="{{asset('/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js')}}"></script>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="/css/style.css">
  </head>
  <body>
<div class="header">
    <div class="container">
      <div class="logo">
        <h1 ><a href="/"></b>{{trans('header.e_promotions')}}<span>{{trans('header.slogan')}}</span></a></h1>
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
                  <input type="email" required autofocus class="input" name="email" placeholder="{!! trans('login_trans.your_mail') !!}"/>
                  <span class="icon"><i class="glyphicon glyphicon-envelope"></i></span>

                  @if ($errors->has('email'))
                  <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                  </span>
                  @endif
                </li>
                <li>
                  <input type="password" name="password" required class="input" placeholder="{!! trans('login_trans.password') !!}"/>
                  <span class="icon"><i class="fa fa-lock"></i></span>
                  @if ($errors->has('password'))
                  <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                  </span>
                  @endif
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
        <a href="{{url('redirect/facebook')}}" class="fb"><i class="fa fa-facebook"></i></a>
        <a href="{{url('redirect/twitter')}}" class="tw"><i class="fa fa-twitter"></i></a>
        <a href="{{url('redirect/google')}}" class="gp"><i class="fa fa-google-plus"></i></a>
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

              @if ($errors->has('name'))
              <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
              </span>
              @endif
            </li>
            <li>
              <input id="email" type="email" required class="input" name="email" placeholder="{!! trans('login_trans.your_mail') !!}"/>
              <span class="icon"><i class="glyphicon glyphicon-envelope"></i></span>

              @if ($errors->has('email'))
              <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
              </span>
              @endif
            </li>
            <li>
              <input id="password" type="password" required class="input" name="password" placeholder="{!! trans('login_trans.password') !!}"/>
              <span class="icon"><i class="fa fa-lock"></i></span>

              @if ($errors->has('password'))
              <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
              </span>
              @endif
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
