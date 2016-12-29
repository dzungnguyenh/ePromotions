@include('include.header')

  <div class="container detail-promotion">
    <div class="page-header">
      <h1>{{ $promotion->title }}</h1>
    </div>
  <div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#description" aria-controls="home" role="tab" data-toggle="tab">{{ trans('promotion.description') }}</a></li>
    <li role="presentation"><a href="#date" aria-controls="profile" role="tab" data-toggle="tab">{{ trans('promotion.time_takes_place') }}</a></li>
    <li role="presentation"><a href="#detail-product" aria-controls="messages" role="tab" data-toggle="tab">{{ trans('promotion.detail_product') }}</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="description">
      {{ $promotion->description }}
    </div>
    <div role="tabpanel" class="tab-pane" id="date">
      <p>{{ trans('promotion.date_start') }} : {{ $promotion->date_start }}</p>
      <p>{{ trans('promotion.date_end') }} : {{ $promotion->date_end }}</p>
    </div>
    <div role="tabpanel" class="tab-pane" id="detail-product">

      <div class="single">
        <div class="container">
          <div class="single-top-main">
            <div class="col-md-5 single-top">
              <div class="single-w3agile">
                <div id="picture-frame">
                  <img src="{{asset(config('path.picture_product').'/'.$product->picture)}}" data-src="images/si-1.jpg" alt="" class="img-responsive"/>
                </div>
              </div>
            </div>
            <div class="col-md-7 single-top-left ">
              <div class="single-right">
                <h3>{{$product->product_name}}</h3>
              </div>
              <div class="pr-single">
                <p class="reduced ">{{trans('promotion.cost')}}: {{trans('body.currency')}}{{$product->price}}</p>
              </div>
              <div class="pr-single">
                <p>{{trans('label.created_at')}}{{$product->created_at}}</p>
                <p>{{trans('promotion.total_product')}}: {{ $product->quantity }}</p>
                <p>{{trans('promotion.quantity_discounts')}}: {{ $promotion->quantity }}</p>
                <p>{{trans('promotion.sale')}}: {{ $promotion->percent }}</p>
                <p class="sale">{{trans('promotion.after_sale')}}: {{trans('body.currency')}} {{ $product->price-($promotion->percent * $product->price / 100) }}</p>
                <p>{{trans('promotion.business_name')}}: {{ $user->name }}</p>
              </div>
              <p class="in-pa">{{$product->description}}</p>
              <div class="pr-single">
                <p class="reduced "><i>{{trans('body.voted')}}{{$product->vote_products_count}}</i></p>
              </div>
              <ul class="social-top share">
                <li><a  target="_blank" href="{{trans('share.FACEBOOK_SHARE')}}http://{{$_SERVER['SERVER_NAME']}}{{$_SERVER['REQUEST_URI']}}" class="icon facebook"><i class="fa fa-facebook" aria-hidden="true"></i><span></span></a></li>
                <li><a  target="_blank" href="{{trans('share.TWITTER_SHARE')}}http://{{$_SERVER['SERVER_NAME']}}{{$_SERVER['REQUEST_URI']}}" class="icon twitter"><i class="fa fa-twitter" aria-hidden="true"></i><span></span></a></li>
                <li><a  target="_blank" href="{{trans('share.GOOGLE_SHARE')}}http://{{$_SERVER['SERVER_NAME']}}{{$_SERVER['REQUEST_URI']}}" class="icon google-plus"><i class="fa fa-google-plus" aria-hidden="true"></i><span></span></a></li>
              </ul>
              <div class="add add-3">
                <a href="{{ route('book.show', $promotion->product_id) }}"><button class="book my-cart-btn my-cart-b"><i class="glyphicon glyphicon-shopping-cart"></i> {!! trans('label.book') !!}</button></a>
              </div>
              <div class="clearfix"> </div>
            </div>
          </div>
          <div class="clearfix"> </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
@include('include.footer')


