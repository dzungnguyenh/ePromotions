@extends('layouts.template_admin')
@section('main-content')

    <div class="container list-promotion">
        <form method="post" action="{{ route('filter_promotion') }}">
        {{ csrf_field() }}
            <select name="promotion_status" class="form-control">
                <option value="{{ trans('promotion.value_expired') }}">{{ trans('promotion.expired_promotion') }}</option>
                <option value="{{ trans('promotion.value_present') }}">{{ trans('promotion.present_promotion') }}</option>
                <option value="{{ trans('promotion.value_future') }}">{{ trans('promotion.future_promotion') }}</option>
            </select>
            <input type="hidden" name="product_id" value="{{ $productId }}">
            <button type="submit" class="btn btn-default">{{ trans('promotion.submit') }}</button>
        </form>
        
        <div class="page-header">
            <h3>{{ trans('promotion.list_page') }}</h3>
            <a href="{!! route('promotions.create') !!}">
            <h3><span class="glyphicon glyphicon-plus"></span></h3>
        </a>
        </div>
        @if (Session::has('message'))
            <div class="alert alert-info alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                {{ Session::get('message') }}
            </div>
        @endif
        @if (count($promotions))
            <table class="table table-striped table-bordered promotion">
            <thead>
                <tr>
                    <th>{{ trans('promotion.id') }}</th>
                    <th>{{ trans('promotion.image') }}</th>
                    <th>{{ trans('promotion.title') }}</th>
                    <th>{{ trans('promotion.description') }}</th>
                    <th>{{ trans('promotion.percent') }}</th>
                    <th>{{ trans('promotion.quantity') }}</th>
                    <th>{{ trans('promotion.product_id') }}</th>
                    <th>{{ trans('promotion.date_start') }}</th>
                    <th>{{ trans('promotion.date_end') }}</th>
                    <th>{{ trans('promotion.uploaded_at') }}</th>
                    <th>{{ trans('promotion.edit') }}</th>
                    <th>{{ trans('promotion.delete') }}</th>
                </tr>
            </thead>
        <tbody>
        @foreach ($promotions as $promotion)
        <tr>
            <td>{{ $promotion->id }}</td>
            <td><img class="img-promotion" src="{{ URL::to('/') .DIRECTORY_SEPARATOR.config('promotion.IMAGE_PATH'). $promotion->image }}"></td>
            <td>{{ str_limit($promotion->title, 50) }}</td>
            <td>{{ str_limit($promotion->description, 100) }}</td>
            <td>{{ $promotion->percent }}</td>
            <td>{{ $promotion->quantity }}</td>
            <td>{{ $promotion->product_id }}</td>
            <td>{{ $promotion->date_start }}</td>
            <td>{{ $promotion->date_end }}</td>
            <td>{{ $promotion->updated_at }}</td>
            <td>
                <a href="{{ route('promotions.edit', $promotion->id) }}" class="btn btn-info"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
            </td> 
            <td>
                <form action="{{ route('promotions.destroy', $promotion->id) }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-danger">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </form>
            </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        @else 
            <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <p>{{ trans('promotion.error_promotion') }}</p>
            </div>
        @endif
        @if(isset($productId))
        <p><a href="{{ route('add_promotion', ['productId'=> $productId]) }}"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>{{ trans('promotion.add_promotion') }}</a></p>
        @endif
    </div>
@stop
