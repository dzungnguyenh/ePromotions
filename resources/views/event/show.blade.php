@extends ('layouts.template_business')

@section ('main-content')
    <section class="content-header">
        <h1>{!! trans('event.event_detail') !!}</h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12">
                        @include('event.show_fields')
                        <a href="{!! route('event.index') !!}" class="btn btn-info">{!! trans('label.back') !!}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
