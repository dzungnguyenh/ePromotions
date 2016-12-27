@include('include.header')
  <div class="row">
    <div class="col-xs-6 col-lg-10">
        <h2 class="event-detail-title">{{$eventDetail->title}}</h2>
        <p>{{$eventDetail->description}}</p>
        <img src="{!! asset(config('path.picture_event').DIRECTORY_SEPARATOR.$eventDetail->image) !!}" class="img-event-detail">
        <p class="date-start-event-detail">{{$eventDetail->start_time}}</p>
        <p class="date-end-event-detail">{{$eventDetail->end_time}}</p>
    </div><!--/.col-xs-6.col-lg-4-->
   </div>
@include('include.footer')
