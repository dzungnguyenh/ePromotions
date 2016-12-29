@extends('layouts.template_admin')
@section('head-link')
    <link rel="stylesheet" type="text/css" href="{{asset('css/business_order.css')}}">
@endsection
@section('main-content')
    <div id="order-business">
        <h2 class="title-h2">{{ trans('book.list_order')}}</h2>

        <form action="{{route('searchorder')}}" method="get" class="form-search-guest">
            <div class="col-md-3 col-md-offset-9">
                <div id="custom-search-input">
                    <div class="input-group col-md-12">
                        <input type="text" class="form-control " placeholder="{{trans('order.order_search')}}"  
                        name="id"/>
                        <span class="input-group-btn">
                            <button class="btn btn-info " type="submit">
                                <i class="glyphicon glyphicon-search"></i>
                            </button>
                        </span>
                    </div>
                </div>
            </div>
        </form><!-- end form-search-guest-->

        <table class="table table-striped table-business-order">
            <thead>
                <tr>
                    <th>{{trans('product.no')}}</th>
                    <th>{{trans('product.product_name')}}</th>
                    <th>{{trans('product.name')}}</th>
                    <th>{{trans('product.price')}}</th>
                    <th>{{trans('product.quantity')}}</th>
                    <th>{{trans('product.date_order')}}</th>
                    <th>{{trans('product.picture')}}</th>
                    <th>{{trans('product.status')}}</th>
                    <th>{{trans('product.action')}}</th>
                </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
            
                <tr>
                    <td>{{$order->id}}</td>
                    <td>
                        <a href="{{route('product.show', [$order->product_id])}}"> {{$order->product_name}}</a>
                    </td>
                    <td><a href="">{{$order->name}}</a></td>
                    <td>{{number_format($order->price)}}</td>
                    <td>{{$order->book_quantity}}</td>
                    <td>{{$order->created_at->format(config('date.date_system'))}}</td>
                    <td>
                        <img  class="img-order-product" src="{{asset(config('path.picture_product').$order->picture)}}">
                    </td>
                    <td id="accept-order{{$order->bookDetailId}}">{!! $order->status==0?trans('book.not_success'):trans('book.success') !!}</td>
                    <td>
                        <button class="btn btn-primary are_you_sure_accept accept-order" value="{{$order->bookDetailId}}" {!! $order->status==0?trans('label.null'):trans('label.disabled') !!}>
                            <i class="glyphicon glyphicon-ok"></i>
                        </button>
                        <form class="form-inline form-delete-order-business" 
                        method="post" action="{{ route('order.destroy',[$order->id]) }}">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="DELETE">
                            <button class="btn btn-danger btn-delete-order-business"
                                alt="{{ trans('book.are_you_sure_delete') }}">
                                <i class="glyphicon glyphicon-remove"></i>
                            </button>
                        </form><!-- end form-delete-order-business -->
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table><!-- end table-business-order -->
    </div><!-- end order-business -->
@endsection

@section('footer-link')
    <script type="text/javascript" src="{{asset('js/business_order.js')}}"></script>
@endsection
