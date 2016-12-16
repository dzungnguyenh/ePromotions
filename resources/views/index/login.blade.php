<!DOCTYPE html>
<html lang="en-IN">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href='http://fonts.googleapis.com/css?family=Ropa+Sans' rel='stylesheet'>
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel='stylesheet'>
    <!-- Latest compiled and minified CSS & JS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="http://localhost/css/style_login.css">
    <script src="http://localhost/js/login.js" type="text/javascript" charset="utf-8" async defer></script>
    <!-- Scripts -->
    <script>
    window.Laravel = <?php echo json_encode([
    'csrfToken' => csrf_token(),
    ]); ?>
    </script>
  </head>
  <body>
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
              <input type="text" required class="input" name="name" placeholder="{!! trans('login_trans.full_name') !!}"/>
              <span class="icon"><i class="fa fa-user"></i></span>
            </li>
            <li>
              <input type="email" required class="input" name="email" placeholder="{!! trans('login_trans.your_mail') !!}"/>
              <span class="icon"><i class="glyphicon glyphicon-envelope"></i></span>
            </li>
            <li>
              <input type="password" required class="input" name="password" placeholder="{!! trans('login_trans.password') !!}"/>
              <span class="icon"><i class="fa fa-lock"></i></span>
            </li>
            <li>
              <input type="password" required class="input" name="password-confirm" placeholder="{!! trans('login_trans.confirm_pass') !!}"/>
              <span class="icon"><i class="fa fa-lock"></i></span>
            </li>
            <li>
              <input type="checkbox" id="check1">
              <label for="check1">{!! trans('login_trans.condition') !!}</label>
            </li>
            <li>
              <input type="submit" value="SIGN UP" class="btn btn-primary" >
            </li>
          </ul>
        </form>
      </div>
    </section>
  </div>
</div>
</body>
</html>