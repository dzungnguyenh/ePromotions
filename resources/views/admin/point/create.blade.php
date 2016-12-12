@extends ('layouts.template_admin')

@section ('main-content')
    <section class="content-header">
        <h1>{!! trans('point.point') !!}</h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'point.store']) !!}

                        @include('admin.point.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
