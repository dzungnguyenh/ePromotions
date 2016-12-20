@extends('layouts.template_admin')
@section('main-content')
    <div id="order-user">
        <div class="container">
        <h2>{{ trans('user_order.list_order')}}</h2>
        @if(Session::has('msg'))
            <div class="alert alert-success">
                {{ Session::get('msg') }}
            </div>
        @endif
            <table class="table">
                <thead>
                    <tr>
                        <th>{{ trans('user_order.book_id') }}</th>
                        <th>{{ trans('user_order.product_name') }}</th>
                        <th>{{ trans('user_order.price') }}</th>
                        <th>{{ trans('user_order.quantity') }}</th>
                        <th>{{ trans('user_order.picture') }}</th>
                        <th>{{ trans('user_order.created_at') }}</th>
                        <th>{{ trans('user_order.status') }}</th>
                        <th>{{ trans('user_order.action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->book_id }} </td>
                            <td>{{ $order->product_name }} </td>
                            <td>{{ $order->price }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td><img src="{{ asset(config('path.picture_product').$order->picture) }} "></td>
                            <td>{{ $order->created_at }}</td>
                            <td>{{ $order->status }}</td>
                            <td>
                                 {{ Form::open([ 'method' => 'delete', 'route' => ['userorder.destroy', $order->book_id], 'class' => 'form-delete-user-order' ]) }}
                                    <button type="submit" class="btn btn-danger btn-delete-user-order" alt="{{ trans('product.are_you_sure_delete') }}">
                                        <i class="glyphicon glyphicon-remove"></i>
                                    </button>
                                {{Form::close()}}
                                <button class="btn btn-primary">
                                    <i class="glyphicon glyphicon-edit"></i>
                                </button>
                             </td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div><!-- end container-->
    </div><!-- end order-user-->
@endsection