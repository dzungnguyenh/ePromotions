<table class="table table-responsive" id="business-table">
    <thead>
        <th>{!! trans('label.no') !!}</th>
        <th>{!! trans('user.name') !!}</th>
        <th>{!! trans('user.email') !!}</th>
        <th>{!! trans('user.phone') !!}</th>
        <th>{!! trans('user.address') !!}</th>
        <th colspan="3">{!! trans('label.action') !!}</th>
    </thead>
    <tbody>
    @foreach($businesses as $business)
        <tr>
            <td>{!! $sort++ !!}</td>
            <td>{!! $business->name !!}</td>
            <td>{!! $business->email !!}</td>
            <td>{!! $business->phone !!}</td>
            <td>{!! $business->address !!}</td>
            <td>
                {!! Form::open() !!}
                <div class='btn-group'>
                    <a href="#" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs btn-delete', 'alt' => trans('message.are_you_sure')]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>