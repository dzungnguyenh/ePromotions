@include('include.header')
  <div class="container">
  	@foreach($events as $event)
        <div class="col-md-3 pro-1">
          <div class="col-m item-product">
            <a href="" data-toggle="modal" data-target="#myModal17" class="offer-img btn-detail-product">
              <img src="{{config('path.picture_event')}}/{{$event->image}}" class="img-responsive" alt="">
            </a><br>
            <h4 class="btn-detail-product">
              {{str_limit($event->title, config('constants.length_titile'))}}
            </h4>
            <div class="mid-1">
              <div class="mid-2">
                <p >
                  <em class="item_price">{{trans('event.place')}}</em><br><br>
                  <em class="item_price">{{trans('event.description')}}</em><br><br>
                  <em class="item_price">{{trans('event.start_time')}}</em><br><br>
                  <em class="item_price">{{trans('event.end_time')}}</em><br><br>
                </p>
                <div class="block">
                    <div class="starbox small ghosting">
                        {{str_limit($event->place, config('constants.length_titile'))}}
                    </div>
                    <br />
                    <div class="starbox small ghosting">
                        {{str_limit($event->description, config('constants.length_titile'))}}
                    </div>
                    <br>
                    <div class="starbox small ghosting">
                        {{ $event->start_time }}
                    </div>
                    <br />
                    <div class="starbox small ghosting">
                        {{ $event->end_time }}
                    </div>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="add add-2">
                  <a href="{{ url('event/'.$event->id.'/join') }}" >
                    <button class="btn btn-danger my-cart-btn my-cart-b" alt="{{ trans('event.join_event') }}">
                      <i class="fa fa-eye" aria-hidden="true"></i>{{trans('label.join')}}
                    </button>
                  </a>
              </div>
            </div>
            <!-- Detail event -->
            <div class="detail-product">
                <div class="sub-product">
                     <img src="{{config('path.picture_event')}}/{{$event->image}}" class="img-responsive" alt="">
                    <h6>{{ trans('event.title') }} : {{ $event->title}}</h6><br>
                    <h6>{{ trans('event.place') }} : {{$event->place}}</h6><br>
                    <h6>{{ trans('event.description') }} : {{$event->description}}</h6><br>
                    <h6>{{ trans('event.start_time') }} : {{$event->start_time}}</h6><br>
                    <h6>{{ trans('event.end_time') }} : {{$event->end_time}}</h6><br>
                </div><!-- end sub-product -->
                <div class="sub-business">
                    <div class="add add-2">
                        <a href="{{ url('event/'.$event->id.'/join') }}" >
                          <button class="btn btn-danger my-cart-btn my-cart-b" alt="{{ trans('event.join_event') }}">
                            <i class="fa fa-eye" aria-hidden="true"></i>{{trans('label.join')}}
                          </button>
                        </a>
                    </div>
                </div><!-- end sub-business -->
            </div>
          </div>
        </div>
     @endforeach
   </div>
@include('include.footer')
