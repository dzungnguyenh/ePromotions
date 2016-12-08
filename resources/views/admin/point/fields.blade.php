@if ($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif

<!-- Vote Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vote', trans('point.vote')) !!}
    {!! Form::input('number', 'vote', null , ['class' => 'form-control', 'step' => '1', 'min' => '0', 'max' => '10']) !!}
</div>
<div class="clearfix"></div>

<!-- Share Field -->
<div class="form-group col-sm-6">
    {!! Form::label('share', trans('point.share')) !!}
    {!! Form::input('number', 'share', null , ['class' => 'form-control', 'step' => '1', 'min' => '0', 'max' => '10']) !!}
</div>
<div class="clearfix"></div>

<!-- Book Field -->
<div class="form-group col-sm-6">
    {!! Form::label('book', trans('point.book')) !!}
    {!! Form::input('number', 'book', null , ['class' => 'form-control', 'step' => '1', 'min' => '0', 'max' => '10']) !!}
</div>
<div class="clearfix"></div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit( trans('label.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('point.index') !!}" class="btn btn-default">{!!  trans('label.back') !!}</a>
</div>