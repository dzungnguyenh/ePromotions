<table class="table table-responsive" id="event-table">
    <thead>
        <th>{!! trans('event.title') !!}</th>
        <th>{!! trans('event.description') !!}</th>
        <th>{!! trans('event.start_time') !!}</th>
        <th>{!! trans('event.end_time') !!}</th>
        <th>{!! trans('event.place') !!}</th>
        <th>{!! trans('event.image') !!}</th>
        <th colspan="3">{!! trans('label.action') !!}</th>
    </thead>
    <tbody>
    @foreach($event as $event)
        <tr>
            <td>{{ str_limit($event->title, 20) }}</td>
            <td>{{ str_limit($event->description, 20) }}</td>
            <td>{!! $event->start_time !!}</td>
            <td>{!! $event->end_time !!}</td>
            <td>{{ str_limit($event->place, 20) }}</td>
            <td><img id="image" src="{!! asset(config('path.image_event').'/'.$event->image) !!}" width="100px" class="img-responsive" />
            <td>
                {!! Form::open([ 'route' => ['event.destroy', $event->id], 'method' => 'delete', 'id' => 'delete-event']) !!}
                <div class='btn-group'>
                    <a href="{!! route('event.show', [$event->id]) !!}" class='btn btn-info btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('event.edit', [$event->id]) !!}" class='btn btn-success btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs btn-delete-events', 'alt' => trans('message.are_you_sure')]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>