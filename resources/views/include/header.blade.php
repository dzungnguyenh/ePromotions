<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{!! trans('header.title') !!}</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('/bower_components/AdminLTE/bootstrap/css/bootstrap.min.css')}}">
        <script type="text/javascript" src="{{asset('/bower_components/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
        <script src="{{asset('/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js')}}"></script>
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
                <ul class="nav navbar-nav navbar-right">
                    @if (!$flag)
                    <li><a href="{!! url('login') !!}""><span class="glyphicon glyphicon-log-in"></span>{!! trans('header.login') !!}</a></li>
                    @else
                        <form id="logout-form" action="{{ url('/logout') }}" method="POST">
                        {{ csrf_field() }}
                        </form>
                        <li><a href="{!! url('logout') !!}" id="submit-form"><span class="glyphicon glyphicon-log-in"></span>{!! trans('header.logout') !!}</a></li>
                    @endif
                </ul>
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
        <div class="jumbotron text-center">
            <h1>{!! trans('header.epromotion') !!}</h1>
            <p>{!! trans('header.slogan') !!}</p>
            <div class="container">
                <div class="col-sm-12 pull-right well">
                    <form class="form-inline" action="#" method="get">
                        <div class="input-group col-sm-8">
                            <input class="form-control" type="text" value="" placeholder="Search" name="q">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-choice-category dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span id="mydropdowndisplay">{!! trans('header.choice_category') !!}</span><span class="caret"></span></button>
                                <ul class="dropdown-menu" id="mydropdownmenu">
                                    <li><a href="#">{!! trans('header.category_promotion') !!}</a></li>
                                    <li><a href="#">{!! trans('header.category_product') !!}</a></li>
                                    <li><a href="#">{!! trans('header.category_event') !!}</a></li>
                                </ul>
                                <input type="hidden" id="mydropwodninput" name="category">
                                </div><!-- /btn-group -->
                            </div>
                            <button class="btn btn-primary col-sm-3 pull-right" type="submit">{!! trans('header.search') !!}</button>
                        </form>
                    </div>
                </div>
            </div>