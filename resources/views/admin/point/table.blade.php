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
                {!! Form::open() !!}
                <div class='btn-group'>
                    <a href="#" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="#" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>