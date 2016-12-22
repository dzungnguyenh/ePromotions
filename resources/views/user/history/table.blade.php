<table class="table table-responsive" id="points-table">
    <thead>
        <th width="50%">{!! trans('product.product_name') !!}</th>
        <th>{!! trans('user.created_at') !!}</th>
    </thead>
    <tbody>
    @foreach($listHistoryVotes as $listHistoryVote)
        <tr>
            <td  width="50%">{!! $listHistoryVote->product_name !!}</td>
            <td>{!! $listHistoryVote->created_at !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>