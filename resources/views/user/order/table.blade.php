<table class="table table-responsive" id="points-table">
    <thead>
        <th width="30%">{!! trans('product.product_name') !!}</th>
        <th>{!! trans('product.quantity') !!}</th>
        <th>{!! trans('product.price') !!}</th>
        <th>{!! trans('user.day_order') !!}</th>
        <th>{!! trans('user.status_order') !!}</th>
        <th>{!! trans('label.action') !!}</th>
    </thead>
    <tbody>
    @foreach($listOrders as $listOrder)
        <tr>
            <td width="30%">{!! $listOrder->product_name !!}</td>
            <td>{!! $listOrder->quantity !!}</td>
            <td>{!! $listOrder->price !!}</td>
            <td>{!! $listOrder->created_at !!}</td>
            <td>
                @if ($listOrder->status == 0 )
                    <span><i class="glyphicon glyphicon-minus-sign"></i> {!! trans('user.not_received') !!}</span>
                @else
                    <span><i class="glyphicon glyphicon-ok-circle"></i> {!! trans('user.received') !!}</span>
                @endif
            </td>
            <td>
                <div class='btn-group'>
                    <a href="" alt="{{ trans('message.are_you_sure') }}" class='btn btn-default btn-xs btn-delete-voucher'><i class="glyphicon glyphicon-remove"></i></a>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>