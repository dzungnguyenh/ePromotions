<div class="content-top ">
  <div class="container ">
    <div class="spec" style="color: #FAB005">
        <a style="text-decoration: none;" href="{{url('/promotion')}}" alt='{{trans('body.title_promotion')}}'>
          <h3>{{trans('body.title_promotion')}}<i style="color: #FAB005" class="fa fa-chevron-circle-right" aria-hidden="true"></i></h3>
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
                  <a href="#" data-toggle="modal" data-target="#myModal1" class="offer-img">
                    <!-- image product -->
                    <img src="{{config('image.path_product')}}/{{$promotion->product->picture}}" class="img-responsive" alt="">
                    <div class="offer"><p><span>{{trans('body.negative')}}{{$promotion->percent}}{{trans('body.percent')}}</span></p></div>
                  </a>
                  <div class="mid-1">
                    <div class="women">
                      <!--- Click redirect to product -->
                      <h6><a href="{!! route('product.show', [$promotion->product->id]) !!}">
                        {{str_limit($promotion->product->product_name, config('constants.length_titile'))}}
                      </a></h6>
                    </div>
                    <!-- begin Price-->
                    <div class="mid-2">
                      <p >
                        <em class="item_price">
                          <b>
                            {{trans('body.currency')}}{{$promotion->percent * $promotion->product->price / 100}}
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
                        <br />
                        <div class="starbox small ghosting">{{trans('body.voted')}}{{$promotion->product->voteProducts->count()}}
                        </div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                    <!-- end price -->
                    <!-- begin book, Vote  -->
                    <?php
                        $voted = false;
                    ?>
                    <div class="add">
                       <button class="btn btn-danger my-cart-btn my-cart-b ">
                         <i class="fa fa-shopping-cart" aria-hidden="true"></i>{{trans('body.book')}}
                       </button>

                       @if (!(Auth::guest()))
                           @foreach($voteProducts as $voteProduct)
                               @if ((Auth::user()->id == $voteProduct->user_id) && ($voteProduct->product_id == $promotion->product->id))
                                    <?php
                                       $voted = true;
                                    ?>
                               @endif
                           @endforeach
                           @if ($voted)
                             <a href="">
                               <button class="btn btn-success my-cart-btn">
                               <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>{{trans('body.vote')}}
                               </button>
                             </a>
                           @else
                             <a href="">
                               <button class="btn btn-success my-cart-btn my-cart-b">
                               <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>{{trans('body.vote')}}
                               </button>
                             </a>
                           @endif
                       @else
                         <a>
                           <button class="btn btn-success my-cart-btn my-cart-b vote" data-login="{{ Auth::guest() }}" value="{{$promotion->product->id}}">
                             <i class="glyphicon glyphicon-thumbs-up"></i>{{ trans('body.vote') }}
                           </button>
                           <span id="please-login" data-please-login="{{ trans('message.please_login') }}"></span>
                         </a>
                       @endif
                    </div>
                    <!-- end book, vote -->
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
