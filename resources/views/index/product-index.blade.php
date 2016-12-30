<div class="content-top ">
  <div class="container ">
    <div class="spec">
        <a href="{{url('/product')}}" alt='{{trans('body.title_product')}}'>
          <h3>{{trans('body.title_product')}}<i class="fa fa-chevron-circle-right" aria-hidden="true"></i></h3>
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
                              <b id="ajaxVote{{ $product->id }}" value="{{$product->id}}">
                                  @if(isset($arPointVote[$product->id]))
                                      {{ $arPointVote[$product->id] }}
                                  @else
                                      {{ config('constants.ZERO') }}
                                  @endif
                              </b>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                      </div>
                        <div class="add add-2">
                          <a href="{{ route('book.show', $product->id) }}"><button class="book my-cart-btn my-cart-b"><i class="glyphicon glyphicon-shopping-cart"></i> {!! trans('label.book') !!}</button></a>

                            <?php
                              $disabled="";
                            ?>
                          @if (!(Auth::guest()))
                              @foreach($voteProducts as $voteProduct)
                                  @if ((Auth::user()->id == $voteProduct->user_id) && ($voteProduct->product_id == $product->id))
                                        <?php
                                          $disabled = "disabled";
                                        ?>
                                  @endif
                              @endforeach
                          @endif
                            <a>
                              <button class="btn btn-success my-cart-btn my-cart-b vote" {{ $disabled }} data-login="{{ Auth::guest() }}" value="{{$product->id}}">
                                <i class="glyphicon glyphicon-thumbs-up"></i>{{ trans('body.vote') }}
                              </button>
                              <span id="please-login" data-please-login="{{ trans('message.please_login') }}"></span>
                            </a>
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
