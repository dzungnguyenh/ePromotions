@extends ('layouts.template_admin')

@section ('main-content')
    <section class="content-header">
        <h1 class="pull-left">{!! trans('voucher.voucher') !!}</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @include('user.voucher.voucher')
            </div>
        </div>
    </div>
    <section class="content-header">
        <h1 class="pull-left">{!! trans('voucher.voucher_for_you') !!}</h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @include('user.voucher.voucher_for_you')
            </div>
        </div>
    </div>
@endsection
