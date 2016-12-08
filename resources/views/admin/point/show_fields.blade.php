<!-- Id Field -->
<div class="form-group  col-sm-12">
    {!! Form::label('id', trans('point.id')) !!}
    <p>{!! $point->id !!}</p>
</div>

<!-- Vote Field -->
<div class="form-group col-sm-4">
    {!! Form::label('vote', trans('point.vote')) !!}
    <p>{!! $point->vote !!}</p>
</div>

<!-- Share Field -->
<div class="form-group col-sm-4">
    {!! Form::label('share', trans('point.share')) !!}
    <p>{!! $point->share !!}</p>
</div>

<!-- Book Field -->
<div class="form-group col-sm-4">
    {!! Form::label('book', trans('point.book')) !!}
    <p>{!! $point->book !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group  col-sm-6">
    {!! Form::label('created_at', trans('label.created_at')) !!}
    <p>{!! $point->created_at->format(trans('label.date_format_show')) !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_at', trans('label.updated_at')) !!}
    <p>{!! $point->updated_at->format(trans('label.date_format_show')) !!}</p>
</div>
