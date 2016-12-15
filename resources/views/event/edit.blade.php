@extends ('layouts.template_business')

@section ('main-content')
    <section class="content-header">
        <h1>{!! trans('event.event_edit') !!}</h1>
   </section>
   <div class="content">
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($event,['route' => ['event.update', $event->id], 'method' => 'patch']) !!}
                        @include('event.fields')
                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
