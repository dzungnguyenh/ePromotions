<!-- Id Field -->
<div class="form-group col-sm-offset-3 col-sm-6">
    <div class="col-sm-3">
        {!! Form::label('id', trans('voucher.id')) !!}
    </div>
    <p>{!! $voucher->id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group col-sm-offset-3 col-sm-6">
    <div class="col-sm-3">
        {!! Form::label('name', trans('voucher.name')) !!}
    </div>
    <p>{!! $voucher->name !!}</p>
</div>

<!-- Point Field -->
<div class="form-group col-sm-offset-3 col-sm-6">
    <div class="col-sm-3">
        {!! Form::label('point', trans('voucher.point')) !!}
    </div>
    <p>{!! $voucher->point !!}</p>
</div>

<!-- Value Field -->
<div class="form-group col-sm-offset-3 col-sm-6">
    <div class="col-sm-3">
        {!! Form::label('value', trans('voucher.value')) !!}
    </div>
    <p>{!! $voucher->value !!}</p>
</div>

<!-- User Field -->
<div class="form-group col-sm-offset-3 col-sm-6">
    <div class="col-sm-3">
        {!! Form::label('user', trans('voucher.user')) !!}
    </div>
    <span>{!! $exchangeVoucher['message'] !!}</span>
    @foreach ($exchangeVoucher['list'] as $exVoucher)
        <a href="{!! route('users.show', [$exVoucher['user_id']]) !!}">
            <span>{!! $exVoucher['name'] !!}</span>
        </a>
        @if ($exVoucher->status == 0 )
        <span class="not-received-{{ $exVoucher->idExVoucher }}">
            <button class="btn btn-default btn-xs btn-accept-voucher" alt="{{ trans('message.are_you_sure') }}" title="{!! trans('user.not_received') !!}" value="{{ $exVoucher->idExVoucher }}"><i class="glyphicon glyphicon-minus-sign"></i></button>
        </span>
        <button class="btn btn-default btn-xs status-received-{{ $exVoucher->idExVoucher }}" disabled style="display: none;" title="{!! trans('user.received') !!}"><i class="glyphicon glyphicon-ok-circle"></i></button>
        @else
            <button class="btn btn-default btn-xs status-received-{{ $exVoucher->idExVoucher }}" disabled title="{!! trans('user.received') !!}"><i class="glyphicon glyphicon-ok-circle"></i></button>
        @endif
        {!! trans('label.space') !!}
    @endforeach
</div>

<!-- Created At Field -->
<div class="form-group col-sm-offset-3 col-sm-6">
    <div class="col-sm-3">
        {!! Form::label('created_at', trans('label.created_at')) !!}
    </div>
    <p>{!! $voucher->created_at->format(trans('label.date_format_show')) !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-offset-3 col-sm-6">
    <div class="col-sm-3">
        {!! Form::label('updated_at', trans('label.updated_at')) !!}
    </div>
    <p>{!! $voucher->updated_at->format(trans('label.date_format_show')) !!}</p>
</div>
