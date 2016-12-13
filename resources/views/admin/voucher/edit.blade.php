@extends ('layouts.template_admin')

@section ('main-content')
    <section class="content-header">
        <h1>{!! trans('voucher.edit_voucher') !!}</h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::model($voucher, ['route' => ['voucher.update', $voucher->id], 'method' => 'patch']) !!}
                        @include('admin.voucher.fields')
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
