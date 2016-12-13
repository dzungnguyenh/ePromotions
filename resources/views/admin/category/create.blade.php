@extends ('layouts.template_admin')

@section ('main-content')

  <div class="col-md-8">

    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">{!! trans('category.TITLE_CREATE') !!}</h3>
      </div>

      {!! Form::open(['route' => 'category.store', 'class' => 'form-horizontal'])!!}

          @include('admin.category.form')

      {!! Form::close() !!}

    </div>

@endsection
