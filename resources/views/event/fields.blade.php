@if ($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif

<!-- Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label(trans('event.title')) !!}
    {!! Form::input('text','title', null , ['class' => 'form-control']) !!}
</div>
<div class="clearfix"></div>

<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label(trans('event.description')) !!}
    {!! Form::input('text', 'description', null , ['class' => 'form-control']) !!}
</div>
<div class="clearfix"></div>

<!-- Start Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label( trans('event.start_time')) !!}
    {!! Form::input('datetime-local','start_time','null',['class' => 'form-control']) !!}
</div>
<div class="clearfix"></div>

<!-- End Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label( trans('end_time')) !!}
    {!! Form::input('datetime-local', 'end_time','null', ['class' => 'form-control']) !!}
</div>
<div class="clearfix"></div>

<!-- Place Field -->
<div class="form-group col-sm-6">
    {!! Form::label(trans('event.place')) !!}
    {!! Form::input('text', 'place', null , ['class' => 'form-control']) !!}
</div>
<div class="clearfix"></div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit( trans('label.save'), ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('event.index') !!}" class="btn btn-success">{!!  trans('label.back') !!}</a>
</div>