@extends('admin.layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">{!! trans('point.point') !!}</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>
        @if(Session::has('msg'))
            <div class="alert alert-success">
                {{ Session::get('msg') }}
            </div>
        @endif
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @include('admin.point.table')
            </div>
        </div>
    </div>
@endsection