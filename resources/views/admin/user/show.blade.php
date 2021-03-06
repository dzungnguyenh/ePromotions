@extends ('layouts.template_admin')
@section ('main-content')
<section class="content-header">
    <h1>{!! trans('user.detial_user') !!}</h1>
</section>
<div class="content">
    <div class="box box-primary">
        <div class="box-body">
            <div class="row">
                <div class="col-sm-12">
                <div class="user-left">
                    <!-- Name Field -->
                    <p class="form-group">
                        {!! Form::label('name', trans('user.name')) !!}
                        {!! $user->name !!}
                    </p>
                    <!-- Emai Field -->
                    <p class="form-group">
                        {!! Form::label('email', trans('user.email')) !!}
                        {!! $user->email !!}
                    </p>
                    <!-- Gender Field -->
                    <p class="form-group">
                        {!! Form::label('gender', trans('user.gender')) !!}
                        @if ($user['gender'] == config('constants.MALE'))
                        {!! trans('user.male') !!}
                        @elseif ($user['gender'] == 'constants.FEMALE')
                        {!! trans('user.female') !!}
                        @else
                        {!! trans('user.other') !!}
                        @endif
                    </p>
                    <!-- Birthday Field -->
                    <p class="form-group">
                        {!! Form::label('birthday', trans('user.dob')) !!}
                        {!! $user->dob !!}
                    </p>
                    <!-- Phone Field -->
                    <p class="form-group">
                        {!! Form::label('phone', trans('user.phone')) !!}
                        {!! $user->phone !!}
                    </p>
                    <!-- Address Field -->
                    <p class="form-group">
                        {!! Form::label('address', trans('user.address')) !!}
                        {!! $user->address !!}
                    </p>
                    <!-- Created Field -->
                    <p class="form-group">
                        {!! Form::label('created_at', trans('label.created_at')) !!}
                        {!! $user->created_at !!}
                    </p>
                    <!-- Update Field -->
                    <p class="form-group">
                        {!! Form::label('updated_at', trans('label.updated_at')) !!}
                        {!! $user->updated_at !!}
                    </p>
                    </div>
                    <div class="user-left">
                    <!-- Point Field -->
                    <p class="form-group">
                        {!! Form::label('updated_at', trans('label.point')) !!}
                        {!! $user->point !!}
                    </p>
                     <!-- Avatar Field -->
                    <p class="form-group-2">
                        {!! Form::label('avatar', trans('user.avatar')) !!}
                        <img src="{!! config('image.path_avatar') !!}/{!! $user->avatar !!}" class="avatar">
                    </p>
                    </div>
                    <div class='clearfix'></div>
                    <a class="btn btn-default"  href="{!! URL::previous() !!}">{!! trans('label.back') !!}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection