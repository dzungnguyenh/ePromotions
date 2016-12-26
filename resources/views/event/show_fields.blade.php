<!-- Id Field -->
<div class="form-group  col-sm-12">
    {!! Form::label('id', trans('event.id')) !!}
    <p>{!! $event->id !!}</p>
</div>

<!-- Title Field -->
<div class="form-group col-sm-12">
    {!! Form::label(trans('event.title')) !!}
    <p>{!! $event->title !!}</p>
</div>

<!-- Description Field -->
<div class="form-group col-sm-12">
    {!! Form::label( trans('event.description')) !!}
    <p>{!! $event->description !!}</p>
</div>

<!-- start time -->
<div class="form-group col-sm-12">
    {!! Form::label(trans('event.start_time')) !!}
    <p>{!! $event->start_time !!}</p>
</div>

<!-- end time -->
<div class="form-group col-sm-12">
    {!! Form::label(trans('event.end_time')) !!}
    <p>{!! $event->end_time !!}</p>
</div>

<!-- place -->
<div class="form-group col-sm-12">
    {!! Form::label(trans('event.place')) !!}
    <p>{!! $event->place !!}</p>
</div>

<!-- Image -->
<div class="form-group col-sm-12 event-image">
    {!! Form::label(trans('event.image')) !!}
    <img src="{!! asset(config('path.image_event').DIRECTORY_SEPARATOR.$event->image) !!}">
</div>