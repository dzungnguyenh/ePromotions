<table class="table table-responsive" id="points-table">
    <thead>
        <th>{!! trans('voucher.id') !!}</th>
        <th>{!! trans('voucher.name') !!}</th>
        <th>{!! trans('voucher.point') !!}</th>
        <th>{!! trans('voucher.value') !!}</th>
        <th colspan="3">{!! trans('label.register') !!}</th>
    </thead>
    <tbody>
    @foreach($listVouchers as $voucher)
        <tr>
            <td>{!! $voucher->id !!}</td>
            <td>{!! $voucher->name !!}</td>
            <td>{!! $voucher->point !!}</td>
            <td>{!! $voucher->value !!}</td>
            <td>
                <div class='btn-group'>
                    <button alt="{{ trans('message.are_you_sure') }}" data-not-received = "{!! trans('user.not_received') !!}" data-pointVoucher = "{{ $voucher->point }}" data-infoPoint = "{{ trans('message.point_lower') }}" value="{{ $voucher->id }}" class='btn btn-default btn-xs btn-register-voucher'><i class="glyphicon glyphicon-check"></i></button>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>