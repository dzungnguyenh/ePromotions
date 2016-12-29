@include('include.header')
  <div class="row">
  	@foreach($events as $event)
        <div class="col-xs-6 col-lg-6">
            <h2>{{str_limit($event->title,20)}}</h2>
            <p>{{str_limit($event->description,20)}}</p>
            <a href="event-detail/{{$event->id}}" data-toggle="modal" data-target="#myModal17" class="offer-img">
                <img src="{{config('path.picture_event')}}/{{$event->image}}" class="img-event-detail" alt="hinhf">
            </a>
            <p>{{str_limit($event->place,20)}}</p>
            <p><a class="btn btn-primary" href="event-detail/{{$event->id}}" role="button">View details »</a></p>
        </div><!--/.col-xs-6.col-lg-4-->
     @endforeach
   </div>
@include('include.footer')
