@extends('layouts.template_admin')
@section('main-content')
    <div class="container create-promotion">
        <div class="page-header">
            <h3>{{ trans('promotion.create_page') }}</h3>
        </div>
        @if(count($errors)>0)
            <div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <ul>
                @foreach($errors->all() as $error)
                    <li><strong>{!! $error !!}</strong></li>
                @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('promotions.store') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="row">
                <div class="form-group upload-image">
                    <label for="image">{{ trans('promotion.image') }}</label>
                    <input type="file" name="image" id="image" value="{{ old('image')}}">
                </div>
                <div class="form-group col-md-5">
                    <label for="title_store">{{ trans('promotion.title') }}</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title')}}">
                </div>
                <div class="form-group col-md-5">
                    <label for="percent">{{ trans('promotion.percent') }}</label><span>( % )</span>
                    <input type="number" class="form-control" id="percent" name="percent" value="{{ old('percent')}}" min="{{ trans('promotion.min_percent') }}" max="{{ trans('promotion.max_percent') }}">
                </div>
                <div class="form-group col-md-5">
                    <label for="description">{{ trans('promotion.description') }}</label>
                    <textarea class="form-control" rows="{{ trans('promotion.row_description') }}" id="description"  name="description" >{{ old('description')}}</textarea>
                </div>
                <div class="form-group col-md-5">
                    <label for="quantity">{{ trans('promotion.quantity') }}</label>
                    <input type="number" min="{{ trans('promotion.min_quantity') }}" class="form-control" id="quantity" name="quantity" value="{{ old('quantity')}}">
                </div>
                <div class="form-group col-md-5">
                    <label for="start_date">{{ trans('promotion.date_start') }}</label>
                    <input type="datetime-local" class="form-control" id="start_date" 
                    name="date_start" value="{{ old('date_start') }}">
                </div>
                <div class="form-group col-md-5">
                    <label for="end_date">{{ trans('promotion.date_end') }}</label>
                    <input type="datetime-local" class="form-control" id="end_date" name="date_end" value="{{ old('date_end') }}">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-offset-6 text-right">
                    <input type="hidden" name="product_id" value="{{ $productId }}">
                    <input type="submit" class="btn btn-primary" value="{{ trans('promotion.submit') }}" />
                    <input type="reset" class="btn btn-primary" value="{{ trans('promotion.clear') }}" />
                </div>
            </div> 
        </form>
    </div>
@stop


