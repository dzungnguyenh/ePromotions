<div class="content-mid">
  <div class="container">
    <div class="spec">
        <a href="{{url('/event')}}" alt='{{trans('body.title_event')}}'>
          <h3>{{trans('body.title_event')}}<i class="fa fa-chevron-circle-right" aria-hidden="true"></i></h3>
        </a>
      <div class="ser-t">
        <b></b>
        <span><i></i></span>
        <b class="line"></b>
      </div>
    </div>

    @foreach ($events as $event)
      <div class="col-md-4 m-w3ls">
        <div class="col-md1 ">
          <a href="{{route('event.show', [$event->id])}}">
            <img src="{{ config('image.event_avatar')}}/{{ $event->image }}" class="img-event-detail" alt="">
            <div class="big-sa">
              <h3>{{str_limit($event->title, config('constants.length_titile_event'))}}</h3>
               <a href="{{ url('event/'.$event->id.'/join') }}" ><button class="btn btn-danger my-cart-btn my-cart-b" alt="{{ trans('event.join_event') }}">
                <i class="fa fa-eye" aria-hidden="true"></i>{{trans('label.join')}}
              </button></a>
            </div>
          </a>
        </div>
      </div>
    @endforeach

    <div class="clearfix"></div>
  </div>
</div>
