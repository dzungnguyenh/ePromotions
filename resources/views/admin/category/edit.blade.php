@extends ('layouts.template_admin')

@section ('main-content')

  <div class="col-md-8">

    <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">{!! trans('category.TITLE_EDIT') !!}</h3>
      </div>

      {!! Form::model($category, ['route' => ['category.update', $category->id], 'method' => 'patch', 'class' => 'form-horizontal']) !!}

          @include('admin.category.form')

      {!! Form::close() !!}

    </div>

@endsection
