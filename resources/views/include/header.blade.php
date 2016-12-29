@include('include.head')
@include('common.alert_message')
<div class="header">
    <div class="container">
        <div class="logo">
            <h1 ><a href="/"><b>{{trans('header.logo_1')}}<br>{{trans('header.logo_2')}}<br>{{trans('header.logo_3')}}</b>{{trans('header.name_web')}}<span>{{trans('header.slogan')}}</span></a></h1>
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
                        <span class="caret"></span>
                        <ul class="dropdown-menu dropdown-menu-right">
                            @if (Auth::user()->role_id == Config::get('constants.ROLEUSER') || Auth::user()->role_id == Config::get('constants.ROLEBUSSINESS') )
                            <li>
                                <a href="#" >
                                <i class="glyphicon glyphicon-heart" aria-hidden="true"></i>{{trans('header.point')}}{!! Auth::user()->point !!}
                                </a>
                            </li>
                            <li>
                                <a href="{{url('/home')}}" ><i class="fa fa-user" aria-hidden="true"></i>{{trans('header.profile')}}</a>
                            </li>
                            <li>
                                <a href="{{url('/logout')}}" ><i class="fa fa-outdent" aria-hidden="true"></i>{{trans('header.logout')}}</a>
                            </li>
                            @else
                            <li>
                                <a href="{{url('/home')}}" ><i class="fa fa-user" aria-hidden="true"></i>{{trans('header.profile')}}</a>
                            </li>
                            <li>
                                <a href="{{url('/logout')}}" ><i class="fa fa-outdent" aria-hidden="true"></i>{{trans('header.logout')}}</a>
                                @endif
                            </li>
                            @endif
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- Search -->
@include('include.search')