@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $message)
            {{ $message }}
        @endforeach
    </div>
@endif

<div class="box-body">
  <div class="form-group">
    <label class="col-sm-4 control-label">{!! trans('category.NAME') !!}</label>
    <div class="col-sm-6">
      {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-4 control-label">{!! trans('category.PARENT')!!}</label>
    <div class="col-sm-6">
      {!! Form::select('parent_id', $list, null, ['class' => 'form-control select2']) !!}
    </div>
  </div>

  <div class="box-footer">
    <input type="reset" class="btn btn-default" />
    {!! Form::submit(trans('label.save'), ['class' => 'btn btn-info pull-right']) !!}
  </div>
</div>
