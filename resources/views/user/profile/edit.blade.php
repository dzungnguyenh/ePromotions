@extends ('layouts.template_admin')

@section ('main-content')
    <section class="content-header">
        <h1>{!! trans('user.edit_profile') !!}</h1>
   </section>
   <div class="content">
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'patch', 'files' => true]) !!}
                        @include('user.profile.fields')
                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
