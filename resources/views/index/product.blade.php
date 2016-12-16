 @include('include.header')
        <div class="container panel-product-index">
            <div class="row row-product">
                @foreach($products as $product)
                    <div class="col-md-3 item-product">
                        <a class="btn-detail-product">
                            <img class="img-responsive" src="{{ asset(config('path.picture_product').'/'.$product->picture) }}" alt="">
                        </a>
                        <h4 class="product-name">
                            <a href="#">{{ substr($product->product_name,0,25) }}</a>
                        </h4>
                        <p>
                        <span class="btn btn-primary">
                            <i  class="glyphicon glyphicon-gbp">
                            </i>: {{ $product->price }}
                        </span>
                        </p>
                        <span class="quantity">Quantity: {{ $product->quantity }}</span>
                        <p class="product-description">{{ substr($product->description,0,20) }}</p>
                        <p><span class="quantity">Date create: {{ $product->created_at->format(config('date.date_time')) }}</span></p>
                        <div class="row row-padding">
                            <button class="btn btn-success"><i class="glyphicon glyphicon-thumbs-up"></i></button>
                            <button class="btn btn-success"><i class="glyphicon glyphicon-share"></i></button>
                            <button class="btn btn-success"><i class="glyphicon glyphicon-shopping-cart"></i></button>
                        </div>
                     <div class="detail-product">
                        <div class="sub-product">
                            <p>{{ trans('product.product_name') }} : {{$product->product_name}}</p>
                            <p>{{ trans('product.price') }} : {{$product->price}}</p>
                            <p>{{ trans('product.description') }} : {{$product->description}}</p>                           
                        </div><!-- end sub-product -->
                        <div class="sub-business">
                             <p>{{ trans('product.business_name') }} : {{$product->user_name}}</p>
                             <p>{{ trans('product.phone') }} :  {{$product->phone}}</p>
                             <p>{{ trans('product.address') }}:  {{$product->address}}</p>                          
                        </div><!-- end sub-business -->
                     </div>
                    </div><!-- end .item-product-->
                @endforeach
            </div><!-- end .row-->
            <hr>
            {!! $products->render() !!}
        </div><!-- end container -->
@include('include.footer')