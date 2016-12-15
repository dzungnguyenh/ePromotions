@extends ('layouts.template_admin')

@section ('main-content')
    <section class="content-header">
        <h1>{!! trans('voucher.show_detail') !!}</h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12">
                        @include('admin.voucher.show_fields')
                        <a href="{!! route('voucher.index') !!}" class="col-sm-1 btn btn-default">{!! trans('label.back') !!}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
