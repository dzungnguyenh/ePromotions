<!-- Id Field -->
<div class="form-group col-sm-12">
    {!! Form::label('id', trans('voucher.id')) !!}
    <p>{!! $voucher->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group col-sm-3">
    {!! Form::label('name', trans('voucher.name')) !!}
    <p>{!! $voucher->name !!}</p>
</div>

<!-- Point Field -->
<div class="form-group col-sm-3">
    {!! Form::label('point', trans('voucher.point')) !!}
    <p>{!! $voucher->point !!}</p>
</div>

<!-- Value Field -->
<div class="form-group col-sm-3">
    {!! Form::label('value', trans('voucher.value')) !!}
    <p>{!! $voucher->value !!}</p>
</div>

<!-- User Field -->
<div class="form-group col-sm-3">
    {!! Form::label('user', trans('voucher.user')) !!}
    <p>{!! $voucher->user_id !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_at', trans('label.created_at')) !!}
    <p>{!! $voucher->created_at->format(trans('label.date_format_show')) !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_at', trans('label.updated_at')) !!}
    <p>{!! $voucher->updated_at->format(trans('label.date_format_show')) !!}</p>
</div>
