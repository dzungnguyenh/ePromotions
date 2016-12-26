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
  <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
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
  <meta name="_token" content="{!! csrf_token() !!}" />
  <link rel="stylesheet" href="{{asset('/css/user_order_index.css')}}">