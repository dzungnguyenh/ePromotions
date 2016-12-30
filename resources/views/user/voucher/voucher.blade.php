<table class="table table-responsive" id="points-table">
    <thead>
        <th>{!! trans('voucher.id') !!}</th>
        <th>{!! trans('voucher.name') !!}</th>
        <th>{!! trans('voucher.point') !!}</th>
        <th>{!! trans('voucher.value') !!}</th>
        <th>{!! trans('voucher.date_register') !!}</th>
        <th>{!! trans('voucher.status') !!}</th>
        <th colspan="3">{!! trans('label.delete') !!}</th>
    </thead>
    <tbody class="add-voucher">
    @foreach($listVouchersUser as $voucher)
        <tr id="exchange-voucher-{{ $voucher->id }}">
            <td>{!! $voucher->id !!}</td>
            <td>{!! $voucher->name !!}</td>
            <td>{!! $voucher->point !!}</td>
            <td>{!! $voucher->value !!}</td>
            <td>{!! $voucher->created_at !!}</td>
            <td>
                <?php $disabled = false; ?>
                @if ($voucher->status == 0 )
                    <span><i class="glyphicon glyphicon-minus-sign"></i> {!! trans('user.not_received') !!}</span>
                @else
                    <span><i class="glyphicon glyphicon-ok-circle"></i> {!! trans('user.received') !!}</span>
                    <?php $disabled = true; ?>
                @endif
            </td>
            <td>
                @if ($disabled)
                    <div class='btn-group'>
                        <button alt="{{ trans('message.are_you_sure') }}" value="{{ $voucher->id }}" class='btn btn-default btn-xs btn-delete-voucher-user'><i class="glyphicon glyphicon-remove"></i></button>
                    </div>
                @endif
            </td>
        </tr>
    @endforeach
        
    </tbody>
    <tr id="item-none" style="display: none;">
        <td class="item-voucher-id"></td>
        <td class="item-voucher-name"></td>
        <td class="item-voucher-point"></td>
        <td class="item-voucher-value"></td>
        <td class="item-voucher-created"></td>
        <td><span><i class="glyphicon glyphicon-minus-sign"></i> {!! trans('user.not_received') !!}</span></td>
        <td></td>
    </tr>
</table>
