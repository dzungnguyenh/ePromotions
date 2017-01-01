@include('include.header')
        @if($totalProduct)
          <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                </button>
                <h4>{{trans('product.message_research_head')}} {{$totalProduct}} {{trans('product.message_research_body')}}: "{{$search}}".
                </h4>
          </div>
        @endif
        <div class="container panel-product-index">
            <div class="row row-product">
                @foreach($products as $product)
                    <div class="col-md-3 pro-1">
                        <div class="col-m item-product">
                            <a href="#" data-toggle="modal" data-target="#myModal17" class="offer-img btn-detail-product">
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
                                  <a href="{{ route('book.show', $product->id) }}">
                                      <button class="btn btn-danger my-cart-btn my-cart-b ">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>{{trans('body.book')}}
                                      </button>
                                  </a>

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
                        <div class="detail-product">
                            <div class="sub-product">
                                <h3>{{$product->product_name}}</h3>
                                <p>{{ trans('product.price') }} : {{ number_format($product->price)}}</p>
                                <p>{{ trans('product.description') }} : {{$product->description}}</p>
                            </div><!-- end sub-product -->
                            <div class="sub-business">
                                 <p>{{ trans('product.business_name') }} : {{$product->user_name}}</p>
                                 <p>{{ trans('product.phone') }} :  {{$product->phone}}</p>
                                 <p>{{ trans('product.address') }}:  {{$product->address}}</p>
                            </div><!-- end sub-business -->
                        </div>
                        </div>
                    </div><!-- end .item-product-->
                @endforeach
            </div><!-- end .row-->
            <hr>
            {!! $products->render() !!}
        </div><!-- end container -->
@include('include.footer')
