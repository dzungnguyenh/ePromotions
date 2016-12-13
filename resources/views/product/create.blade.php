@extends('layouts.template_admin')

@section('main-content')
    <section class="content">
    <h2>{{trans('product.create_product')}}</h2>
    <!-- Your Page Content Here -->
    {!! Form::open([ 'route' => 'product.store', 'files' =>true,]) !!}
    {{ csrf_field() }}
        <label>{{trans('product.product_name')}}</label>
        <input name="product_name" class="form-control" value="{{old('product_name')}}">

        <label>{{trans('product.price')}}</label>
        <input type="number" name="price" class="form-control" value="{{old('price')}}">

        <label>{{trans('product.description')}}</label>
        <input name="description" class="form-control" value="{{old('description')}}">

        <label>{{trans('product.quantity')}}</label>
        <input type="number" name="quantity" class="form-control" value="{{old('quantity')}}">

        <label>{{trans('product.category')}}</label>
        {!! Form::select('category_id', ['1' => 'Fashion', '2' => 'Electric'], 1, ['class'=>'form-control']) !!}

        <label>{{trans('product.picture')}}</label>
        <input type="file" name="picture" class="form-control">

        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <input type="submit" class="btn btn-primary">
    {!!Form::close()!!}
    @foreach($errors->all() as $value)
    <div class="alert alert-warning">{{ $value }}</div>
    @endforeach

    @if(Session::has('msg'))
    <div class="alert alert-success">
    {{ Session::get('msg') }}
    </div>
    @endif
@endsection
