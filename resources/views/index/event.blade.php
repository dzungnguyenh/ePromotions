
<div class="content-mid">
  <div class="container">
    <div class="spec" style="color: #FAB005">
        <a style="text-decoration: none;" href="{{url('/event')}}" alt='{{trans('body.title_event')}}'>
          <h3>{{trans('body.title_event')}}<i style="color: #FAB005" class="fa fa-chevron-circle-right" aria-hidden="true"></i></h3>
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
            <img src="{{ config('image.path_avatar')}}/event.jpg" class="img-responsive img" alt="">
            <div class="big-sa">
              <h3>{{str_limit($event->title, config('constants.length_titile_event'))}}</h3>
              <p>{{str_limit($event->description, config('constants.length_description'))}}</p>
            </div>
          </a>
        </div>
      </div>
    @endforeach

    <div class="clearfix"></div>
  </div>
</div>

