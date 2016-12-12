<table class="table table-responsive" id="points-table">
    <thead>
        <th>{!! trans('voucher.id') !!}</th>
        <th>{!! trans('voucher.name') !!}</th>
        <th>{!! trans('voucher.point') !!}</th>
        <th>{!! trans('voucher.value') !!}</th>
        <th colspan="3">{!! trans('label.action') !!}</th>
    </thead>
    <tbody>
    @foreach($vouchers as $voucher)
        <tr>
            <td>{!! $voucher->id !!}</td>
            <td>{!! $voucher->name !!}</td>
            <td>{!! $voucher->point !!}</td>
            <td>{!! $voucher->value !!}</td>
            <td>
                {!! Form::open([ 'route' => ['voucher.destroy', $voucher->id], 'method' => 'delete', 'id' => 'form-delete-point']) !!}
                <div class='btn-group'>
                    <a href="{!! route('voucher.show', [$voucher->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('voucher.edit', [$voucher->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs btn-delete', 'alt' => trans('message.are_you_sure')]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>