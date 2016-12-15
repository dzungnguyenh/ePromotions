@if ($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif

<!-- Name Field -->
<div class="form-group col-sm-offset-3 col-sm-6">
    {!! Form::label('lbname', trans('voucher.name')) !!}
    {!! Form::input('text', 'name', null , ['class' => 'form-control']) !!}
</div>
<div class="clearfix"></div>

<!-- Point Field -->
<div class="form-group col-sm-offset-3 col-sm-6">
    {!! Form::label('lbpoint', trans('voucher.point')) !!}
    {!! Form::input('number', 'point', null , ['class' => 'form-control', 'step' => config('constants.STEP_POINT'), 'min' => config('constants.MIN_POINT')]) !!}
</div>
<div class="clearfix"></div>

<!-- Value Field -->
<div class="form-group col-sm-offset-3 col-sm-6">
    {!! Form::label('lbvalue', trans('voucher.value')) !!}
    {!! Form::input('text', 'value', null , ['class' => 'form-control']) !!}
</div>
<div class="clearfix"></div>

<!-- Submit Field -->
<div class="form-group col-sm-offset-5 col-sm-2">
    {!! Form::submit( trans('label.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('voucher.index') !!}" class="btn btn-default">{!!  trans('label.back') !!}</a>
</div>