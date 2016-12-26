@extends('layouts.template_admin')

@section('main-content')
    <div id="product-up">
    <h2 class="h2-title">{{ trans('product.update_product') }}</h2>
    {!! Form::open([ 'method' =>'Patch','route' => [ 'product.update',$product->id], 'files' =>true, 'class' => 'product-update-form' ]) !!}
    {{ csrf_field() }}
        <label>{{trans('product.product_name')}}</label>
        <input name="product_name" class="form-control" value="{{$product->product_name}}">

        <label>{{trans('product.price')}}</label>
        <input type="number" name="price" class="form-control" value="{{$product->price}}">

        <label>{{trans('product.description')}}</label>
        <input name="description" class="form-control" value="{{$product->description}}">

        <label>{{trans('product.quantity')}}</label>
        <input type="number" name="quantity" class="form-control" value="{{$product->quantity}}">

        <label>{{trans('product.category')}}</label>
        {!! Form::select('category_id', $listCategory , $product->category_id, ['class'=>'form-control']) !!}

        <label class="lbl-img control-label">{{trans('product.picture')}}
            <input type="file" name="picture" class="form-control" value="{{ $product->picture }}">
        </label>
        <img class="update-img" src="{{asset(config('path.picture_product').'/'.$product->picture)}}">

        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <input type="submit" class="btn btn-primary" id="btn-product-update" alt="{{ trans('product.are_you_sure_update') }}">
    {!!Form::close()!!}

    @foreach($errors->all() as $value)
        <div class="alert alert-warning">{{ $value }}</div>
    @endforeach

    @if(Session::has('msg'))
        <div class="alert alert-success">
            {{ Session::get('msg') }}
        </div>
    @endif
    </div>
@endsection