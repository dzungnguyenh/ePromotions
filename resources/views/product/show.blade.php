@extends('layouts.template_admin')
@section('main-content')
    <div id="product-view">
        <h1>{{trans('product.product')}}</h1>
        <table class="table table-striped product-view-head">
            <thead>
                <tr>
                    <th>{{trans('product.product_name')}}</th>
                    <th>{{trans('product.price')}}</th>
                    <th>{{trans('product.description')}}</th>
                    <th>{{trans('product.quantity')}}</th>
                    <th>{{trans('product.category')}}</th>
                    <th>{{trans('product.picture')}}</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$product->product_name}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->description}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->name}}</td>
                    <td class="product-img"><img src="{{asset(config('path.picture_product').'/'.$product->picture)}}"></td>
                </tr>
            </tbody>
        </table><!-- end product-view-head -->

        <h2>{{trans('product.order')}}</h2>
        <div class="row col-md-10 order-detail detail-th" >
            <div class="col-md-1" ><span>{{ trans('product.no') }}</span></div>
            <div class="col-md-2" ><span>{{ trans('product.customer')}}</span></div>
            <div class="col-md-2" ><span>{{ trans('product.quantity')}}</span></div>
            <div class="col-md-2"><span>{{ trans('product.date_order') }}</span></div>
            <div class="col-md-2"><span>{{ trans('product.status') }}</span></div>
            <div class="col-md-2"><span>{{ trans('product.action')}}</span></div>
        </div><!-- end detail-th-->
        @foreach($orderDetail as $value)
            <div id="mainn">
                <div class="row col-md-10 order-detail">
                    <div class="col-md-1" ><span>1</span></div>
                    <div class="col-md-2" ><span>{{$value->name}}</span></div>
                    <div class="col-md-2"><span>{{$value->quantity}}</span></div>
                    <div class="col-md-2"><span>{{$value->created_at}}</span></div>
                    <div class="col-md-2"><span>{{$value->status}}</span></div>

                    <div class="col-md-2">
                        <button class="btn btn-success btn-view view-product">
                            <a href=""><i class="glyphicon glyphicon-ok"></i></a>
                        </button>
                        <button class="btn btn-success btn-view view-detail-cus" >
                            <i class="glyphicon glyphicon glyphicon-eye-open"></i>
                        </button>
                    </div>
                </div>

                <div class="row col-md-10 detail-customer">
                    <table class="table tbl-detail-customer">
                    <thead>
                        <tr>
                            <th>{{ trans('product.name') }}</th>
                            <th >{{ trans('product.dob') }}</th>
                            <th >{{ trans('product.phone') }}</th>
                            <th>{{ trans('product.address') }}</th>
                            <th >{{ trans('product.email') }}</th>
                            <th >{{ trans('product.gender') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$value->name}}</td>
                            <td>{{$value->dob}}</td>
                            <td>{{$value->phone}}</td>
                            <td>{{$value->address}}</td>
                            <td>{{$value->email}}</td>
                            <td>{{$value->gender}}</td>
                        </tr>
                    </tbody>
                    </table><!-- end tbl-detail-customer -->
                </div>
            </div><!--end main -->
        @endforeach
    </div><!-- end product-view-->
@endsection