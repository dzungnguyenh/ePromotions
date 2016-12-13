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
                <div class='btn-group'>
                    <a href="{!! route('voucher.show', [$voucher->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('voucher.edit', [$voucher->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    <a href="{!! route('admin.voucher.del', $voucher->id) !!}" alt="{{ trans('message.are_you_sure') }}" class='btn btn-default btn-xs btn-delete-voucher'><i class="glyphicon glyphicon-remove"></i></a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>