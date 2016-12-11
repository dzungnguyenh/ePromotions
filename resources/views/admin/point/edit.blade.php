@extends ('layouts.template_admin')

@section ('main-content')
    <section class="content-header">
        <h1>{!! trans('point.edit_point') !!}</h1>
   </section>
   <div class="content">
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($point, ['route' => ['point.update', $point->id], 'method' => 'patch']) !!}
                        @include('admin.point.fields')
                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
