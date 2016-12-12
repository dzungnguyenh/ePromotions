@extends('layouts.app')
@section('content')
<div class="container">
<div class="page-header">
  <h3>{{ trans('promotion.list_page') }}</h3>
</div>
@if (Session::has('message'))
<div class="alert alert-info alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {{ Session::get('message') }}
</div>
@endif
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Description</th>
            <th>Percent</th>
            <th>Quantity</th>
            <th>Product id</th>
            <th>Start Day</th>
            <th>End Day</th>
            <th>Updated at</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($promotions as $promotion)
        <tr>
            <td>{{ $promotion->id }}</td>
            <td>{{ $promotion->title }}</td>
            <td>{{ $promotion->description }}</td>
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
                    <button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
<h4><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span><a href="{{ route('promotions.create') }}"> Add new promotion</a></h4>
</div>
@stop
