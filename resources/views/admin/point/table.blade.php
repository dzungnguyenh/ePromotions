<table class="table table-responsive" id="points-table">
    <thead>
        <th>{!! trans('point.vote') !!}</th>
        <th>{!! trans('point.share') !!}</th>
        <th>{!! trans('point.book') !!}</th>
        <th colspan="3">{!! trans('label.action') !!}</th>
    </thead>
    <tbody>
    @foreach($points as $point)
        <tr>
            <td>{!! $point->vote !!}</td>
            <td>{!! $point->share !!}</td>
            <td>{!! $point->book !!}</td>
            <td>
                {!! Form::open([ 'route' => ['point.destroy', $point->id], 'method' => 'delete', 'id' => 'form-delete-point']) !!}
                <div class='btn-group'>
                    <a href="{!! route('point.show', [$point->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('point.edit', [$point->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs btn-delete', 'alt' => trans('message.are_you_sure')]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>