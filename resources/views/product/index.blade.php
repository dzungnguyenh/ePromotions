@extends('layouts.template_admin')
@section('main-content')

    <h1>{{trans('product.product')}}</h1>

    <table class="table table-striped product-index">
        <thead>
            <tr>
            <th>{{trans('product.product_name')}}</th>
            <th>{{trans('product.price')}}</th>
            <th>{{trans('product.description')}}</th>
            <th>{{trans('product.quantity')}}</th>
            <th>{{trans('product.category')}}</th>
            <th>{{trans('product.picture')}}</th>
            <th>{{trans('product.action')}}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($listProduct as $value)
            <tr>
                <td>{{$value->product_name}}</td>
                <td>{{$value->price}}</td>
                <td>{{$value->description}}</td>
                <td>{{$value->quantity}}</td>
                <td>{{$value->category_id}}</td>
                <td class="product-img"><img src="{{asset(config('path.picture_product').'/'.$value->picture)}}"></td>
                <td>
                    <div class="row action">
                        <button class="btn btn-success btn-view view-product"><a href="{{route('product.show', [$value->id])}}"><i class="glyphicon glyphicon-eye-open"></i></a>
                        </button>
                        {{ Form::open([ 'method' => 'delete', 'route' => ['product.destroy', $value->id],'class'=>'form-delete-product' ]) }}
                            {{ csrf_field() }}
                            <button type="submit" alt="{{trans('product.are_you_sure_delete')}}" class="delete-product btn btn-danger">
                                <i class="glyphicon glyphicon-trash"></i>
                            </button>
                            {{ Form::close() }}
                        <button class="btn btn-info btn-edit"><a href="{{route('product.edit',[$value->id])}}"><i class="glyphicon glyphicon-edit"></i></a></button>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @if(Session::has('msg'))
        <div class="alert alert-success">
        {{ Session::get('msg') }}
        </div>
    @endif
@endsection