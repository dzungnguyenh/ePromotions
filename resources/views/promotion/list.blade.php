@extends('layouts.template_admin')
@section('main-content')
    <div class="container list-promotion">
        <div class="page-header">
            <h3>{{ trans('promotion.list_page') }}</h3>
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
        {{ $promotions->links()}}
        @else 
            <div class="alert alert-danger" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <p>{{ trans('promotion.error_promotion') }}</p>
            </div>
        @endif
        @if(isset($id))
        <p><a href="{{ route('add_promotion', ['id'=> $id]) }}"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>{{ trans('promotion.add_promotion') }}</a></p>
        @endif
    </div>
@stop
