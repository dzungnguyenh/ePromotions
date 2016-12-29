@include('include.header')

<div class="single">
  <div class="container">
    <div class="single-top-main">
      <div class="col-md-5 single-top">

        <div class="single-w3agile">
          <div id="picture-frame">
            <img src="/{{config('image.path_product')}}/{{$product->picture}}" data-src="images/si-1.jpg" alt="" class="img-responsive"/>
          </div>
        </div>

      </div>
      <div class="col-md-7 single-top-left ">
        <div class="single-right">
          <h3>{{$product->product_name}}</h3>

          <div class="pr-single">
            <p class="reduced ">{{trans('body.currency')}}{{$product->price}}</p>
          </div>
          <div class="pr-single">
            <div class="starbox small ghosting">
              <h5>{{trans('label.created_at')}}{{$product->created_at}}</h5>
            </div>
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
            <button class="btn btn-danger my-cart-btn my-cart-b ">
              <i class="fa fa-shopping-cart" aria-hidden="true"></i>{{trans('body.book')}}
            </button>
          </div>
          <div class="clearfix"> </div>

        </div>
      </div>

      <div class="clearfix"> </div>

    </div>
  </div>

</div>

@include('index.product-index')

@include('include.footer')
