@include('include.head')

@include('common.alert_message')

<div class="header">
    <div class="container">
      <div class="logo">
        <h1 ><a href="index.html"><b>{{trans('header.logo_1')}}<br>{{trans('header.logo_2')}}<br>{{trans('header.logo_3')}}</b>{{trans('header.name_web')}}<span>{{trans('header.slogan')}}</span></a></h1>
      </div>
      <div class="head-t">
        <ul class="card">
          @if (Auth::guest())
            <li><a href="{{ url('/register') }}" ><i class="fa fa-arrow-right" aria-hidden="true"></i>{{trans('header.register')}}</a></li>
            <li><a href="{{ url('/about') }}" ><i class="fa fa-file-text-o" aria-hidden="true"></i>{{trans('header.about')}}</a></li>
          @else
            <li><a href="{{ url('/about') }}" ><i class="fa fa-file-text-o" aria-hidden="true"></i>{{trans('header.about')}}</a></li>
          @endif
        </ul>
      </div>
      <div class="header-ri">
        <ul class="social-top">
          <li><a href="#" class="icon facebook"><i class="fa fa-facebook" aria-hidden="true"></i><span></span></a></li>
          <li><a href="#" class="icon twitter"><i class="fa fa-twitter" aria-hidden="true"></i><span></span></a></li>
          <li><a href="#" class="icon google-plus"><i class="fa fa-google-plus" aria-hidden="true"></i><span></span></a></li>
        </ul>
      </div>
        <div class="nav-top">
          <!-- Navigation -->
          @include('include.navigation')
          <!-- End Navigation -->
          <div class="cart" >
            <ul class="card">
              @if (Auth::guest())
              <li><a href="{{url('/login')}}" ><i class="fa fa-user" aria-hidden="true"></i>{{trans('header.login')}}</a></li>
              @else
                <li class="dropdown">
                    <a id="header-name" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                      @if (strcmp(substr(Auth::user()->avatar, 0, 4), 'http'))
                        <img src="{{ config('image.path_avatar')}}/{{Auth::user()->avatar }}" class="img-circle avatar" height="40px" width="40px"/>
                      @else
                        <img src="{{Auth::user()->avatar }}" class="img-circle avatar" height="40px" width="40px"/>
                      @endif
                      <span class="hidden-xs">{{ Auth::user()->name }}</span>
                    </a>
                    <span class="caret"></span></button>
                    <ul class="dropdown-menu dropdown-menu-right">
                      <li><a href="{{url('/profile')}}" ><i class="fa fa-user" aria-hidden="true"></i>{{trans('header.profile')}}</a></li>
                      <li><a href="{{url('/setting')}}" ><i class="fa fa-cog" aria-hidden="true"></i>{{trans('header.setting')}}</a></li>
                      <li>
                        <a href="{{url('/logout')}}" ><i class="fa fa-outdent" aria-hidden="true"></i>{{trans('header.logout')}}</a>
                      </li>
                    </ul>
                </li>
              @endif
            </ul>
          </div>
          <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- Search -->
@include('include.search')