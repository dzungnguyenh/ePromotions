@extends ('layouts.template_business')

@section ('main-content')
    <section class="content-header">
        <h1>{!! trans('event.create_event') !!}</h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(array('route'=>array('event.store'),'method'=>'POST','enctype' => 'multipart/form-data', 'class' => 'basic-grey')) !!}  

                        @include('event.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
