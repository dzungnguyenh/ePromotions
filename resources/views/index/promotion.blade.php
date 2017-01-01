<div class="content-top ">
  <div class="container ">
    <div class="spec">
        <a href="{{url('/promotion')}}" alt='{{trans('body.title_promotion')}}'>
          <h3>{{trans('body.title_promotion')}}<i class="fa fa-chevron-circle-right" aria-hidden="true"></i></h3>
        </a>
      <div class="ser-t">
        <b></b>
        <span><i></i></span>
        <b class="line"></b>
      </div>
    </div>
      <div class="tab-head ">
        <div class=" tab-content tab-content-t ">
          <div class="tab-pane active text-style" id="tab1">
            <div class=" con-w3l">

              @foreach ($promotions as $promotion)
              <div class="col-md-3 m-wthree">
                <div class="col-m">
                  <a href="{!! url('/product', [$promotion->product->id]) !!}" data-toggle="modal" data-target="#myModal1" class="offer-img">
                    <!-- image product -->
                    <img src="{{config('image.path_product')}}/{{$promotion->product->picture}}" class="img-responsive" alt="">
                    <div class="offer"><p><span>{{trans('body.negative')}}{{$promotion->percent}}{{trans('body.percent')}}</span></p></div>
                  </a>
                  <div class="mid-1">
                    <div class="women">
                      <!--- Click redirect to product -->
                      <h6><a href="{!! url('/product', [$promotion->product->id]) !!}">
                        {{str_limit($promotion->product->product_name, config('constants.length_titile'))}}
                      </a></h6>
                    </div>
                    <!-- begin Price-->
                    <div class="mid-2">
                      <p >
                        <em class="item_price">
                          <b>
                            {{trans('body.currency')}}<?php echo $promotion->product->price - $promotion->percent * $promotion->product->price / 100 ?>
                          </b>
                        </em>
                        <br/>
                        <label>{{trans('body.currency')}}{{$promotion->product->price}}</label>
                      </p>
                      <div class="block">
                        @if ($promotion->quantity > 0)
                          <div class="starbox small ghosting">{{trans('body.quantity')}}{{$promotion->quantity}}
                          </div>
                        @endif
                      </div>
                      <div class="clearfix"></div>
                    </div>
                    <!-- end price -->
                    <!-- begin book -->
                    <div class="add">
                       <a href="{{ route('book.show', $promotion->product_id) }}"><button class="book my-cart-btn my-cart-b"><i class="glyphicon glyphicon-shopping-cart"></i> {!! trans('label.book') !!}</button></a>

                       
                    </div>
                    <!-- end book -->
                  </div>
                </div>
              </div>
              </div>
              @endforeach
             </div>
          </div>
        </div>
      </div>
    </div>
</div>
