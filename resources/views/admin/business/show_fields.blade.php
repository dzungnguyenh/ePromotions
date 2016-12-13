<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', trans('user.name')) !!}
    <p>{!! $business->name !!}</p>
</div>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('email', trans('user.email')) !!}
    <p>{!! $business->email !!}</p>
</div>

<!-- Phone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('phone', trans('user.phone')) !!}
    <p>{!! $business->phone !!}</p>
</div>

<!-- Avatar Field -->
<div class="form-group col-sm-6">
    {!! Form::label('avatar', trans('user.avatar')) !!}
        <img src="{!! config('image.path_avatar') !!}/{!! $business->avatar !!}" class="avatar">
</div>
<div class="clearfix"></div>

<!-- Adress Field -->
<div class="form-group col-sm-12">
    {!! Form::label('address', trans('user.address')) !!}
    <p>{!! $business->address !!}</p>
</div>
<div class="clearfix"></div>

<!-- Created At Field -->
<div class="form-group  col-sm-6">
    {!! Form::label('created_at', trans('label.created_at')) !!}
    <p>{!! $business->created_at->format(trans('label.date_format_show')) !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_at', trans('label.updated_at')) !!}
    <p>{!! $business->updated_at->format(trans('label.date_format_show')) !!}</p>
</div>
