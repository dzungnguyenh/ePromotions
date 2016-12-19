@extends ('layouts.template_business')

@section ('main-content')
   <div class="container edit-event">
        <div class="page-header">
            <h3>{{ trans('event.event_edit') }}</h3>
        </div>
        @if(count($errors)>0)
        <div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <ul>
                @foreach($errors->all() as $error)
                <li><strong>{!! $error !!}</strong></li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('event.update', $event->id) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            <div class="form-group">
                <label for="title_edit">{{ trans('event.title') }}</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $event->title) }}">
            </div>
            <div class="form-group">
                <label for="description">{{ trans('event.description') }}</label>
                <textarea class="form-control" rows="5" id="description"  name="description" >{{ old('description', $event->description) }}</textarea>
            </div>
            <div class="form-group">
                <label for="start_time">{{ trans('event.start_time') }}</label>
                <input type="datetime-local" class="form-control" id="start-date" name="start_time" value="{{ old('start_time',gmdate(config('date.date_time'),strtotime($event->start_time))) }}">
            </div>
            <div class="form-group">
                <label for="end_time">{{ trans('event.end_time') }}</label>
                <input type="datetime-local" class="form-control" id="end_time" name="end_time" value="{{ old('end_time',gmdate(config('date.date_time'),strtotime($event->end_time))) }}">
            </div>
            <div class="form-group">
                <label for="description">{{ trans('event.place') }}</label>
                <textarea class="form-control" rows="5" id="place"  name="place" >{{ old('place', $event->place) }}</textarea>
            </div>
                <input type="hidden" class="form-control" name="product_id" value="{{ $event->product_id }}">
                <input type="submit" class="btn btn-info" value="{{ trans('event.update') }}" />
        </form>
    </div>
@stop

