<div class="content-top ">
  <div class="container ">
    <div class="spec" style="color: #FAB005">
        <a style="text-decoration: none;" href="{{url('/product')}}" alt='{{trans('body.title_product')}}'>
          <h3>{{trans('body.title_product')}}<i style="color: #FAB005" class="fa fa-chevron-circle-right" aria-hidden="true"></i></h3>
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

              @foreach ($products as $product)
                <div class="col-md-3 pro-1">
                  <div class="col-m">
                  <a href="#" data-toggle="modal" data-target="#myModal17" class="offer-img">
                      <img src="{{config('image.path_product')}}/{{$product->picture}}" class="img-responsive" alt="">
                    </a>
                    <div class="mid-1">
                      <div class="women">
                        <!--- Click redirect to product -->
                        <h6><a href="{!! url('/product', [$product->id]) !!}">
                          {{str_limit($product->product_name, config('constants.length_titile'))}}
                        </a></h6>
                      </div>
                      <!-- begin Price-->
                      <div class="mid-2">
                        <p ><em class="item_price">{{trans('body.currency')}}{{$product->price}}</em></p>
                          <div class="block">
                            @if ($product->quantity > 0)
                              <div class="starbox small ghosting">{{trans('body.quantity')}}{{$product->quantity}}
                              </div>
                            @else
                              <div class="starbox small ghosting">{{trans('body.empty')}}
                              </div>
                            @endif
                            <br />
                            <div class="starbox small ghosting">{{trans('body.voted')}}
                            </div>
                        </div>
                        <div class="clearfix"></div>
                      </div>
                        <div class="add add-2">
                          <button class="btn btn-danger my-cart-btn my-cart-b ">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>{{trans('body.book')}}
                          </button>

                            <?php
                              $voted = false;
                            ?>
                          @if (!(Auth::guest()))
                              @foreach($voteProducts as $voteProduct)
                                  @if ((Auth::user()->id == $voteProduct->user_id) && ($voteProduct->product_id == $product->id))
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
                              <button class="btn btn-success my-cart-btn my-cart-b vote" data-login="{{ Auth::guest() }}" value="{{$product->id}}">
                                <i class="glyphicon glyphicon-thumbs-up"></i>{{ trans('body.vote') }}
                              </button>
                              <span id="please-login" data-please-login="{{ trans('message.please_login') }}"></span>
                            </a>
                          @endif
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
