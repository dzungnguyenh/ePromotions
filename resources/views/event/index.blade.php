@extends ('layouts.template_business')

@section ('main-content')
    <section class="content-header">
        <h1 class="pull-left">{!! trans('event.event') !!}</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>
        @if(Session::has('msg'))
            <div class="alert alert-success">
                {{ Session::get('msg') }}
            </div>
        @endif
        <a href="{!! route('event.create') !!}">
            <h3><span class="glyphicon glyphicon-plus"></span></h3>
        </a>
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @include('event.table')
            </div>
        </div>
@endsection
