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
        <tr id = "business-{{$business->id}}">
            <td>{!! $sort++ !!}</td>
            <td>{!! $business->name !!}</td>
            <td>{!! $business->email !!}</td>
            <td>{!! $business->phone !!}</td>
            <td>{!! $business->address !!}</td>
            <td>
                {!! Form::open([ 'route' => ['business.destroy', $business->id], 'method' => 'delete', 'id' => 'form-delete-business-'.$business->id]) !!}
                <div class='btn-group'>
                    <a href="{!! route('business.show', [$business->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <span class='btn btn-warning btn-xs block-business' title="{{ trans('business.block_business')}}" value="{{ $business->id }}"><i class="glyphicon glyphicon-ban-circle"></i></span>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs btn-delete-business', 'alt' => trans('business.delete_a_business'), 'name' => $business->name, 'id' => $business->id]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>