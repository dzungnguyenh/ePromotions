@include('include.header')

<div id="promotion" class="promotion"><div class="row"><div class="col-sm-12"><div class="panel panel-primary"><div class="panel-heading">{!! trans('header.promotion') !!}</div></div></div></div></div>
<div class="container">    
    <div class="row">
        @foreach($promotions as $promotion)
        <div class="col-sm-3">
          <div class="panel panel-primary">
            <div class="panel-heading">{{ str_limit($promotion->title, $limit = config('constants.STR_LIMIT'), $end = trans('label.end')) }}</div>
            <div class="panel-body">
            <a href=""><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" alt="Image"></a>
            <p>{!! trans('label.price') !!}<b>{{ $promotion->percent }}{!! trans('label.currency') !!}</b></p>
            <p>{!! trans('label.date_port') !!}<b>{{ $promotion->created_at }}</b></p>
            </div>
            <div class="panel-footer">
                <a href=""><button class="book"><i class="glyphicon glyphicon-shopping-cart"></i> {!! trans('label.book') !!}</button></a>
                <a href=""><button class="share"><i class="glyphicon glyphicon-send"></i>{!! trans('label.share') !!}</button></a>
                <a href=""><button class="vote"><i class="glyphicon glyphicon-thumbs-up"></i>{!! trans('label.vote') !!}</button></a>
            </div>
          </div>
        </div>
        @endforeach
    </div>
    <div class="clearfix"></div>
    <div class="load-more"><button>{!! trans('label.load_more') !!}</button></div>
</div><br>

<div id="product" class="product"><div class="row"><div class="col-sm-12"><div class="panel panel-primary"><div class="panel-heading">{!! trans('header.product') !!}</div></div></div></div></div>
<div class="container">    
    <div class="row">
        @foreach($products as $product)
        <div class="col-sm-3">
          <div class="panel panel-primary">
            <div class="panel-heading">{{ str_limit($product->product_name, $limit = config('constants.STR_LIMIT'), $end = trans('label.end')) }}</div>
            <div class="panel-body">
            <a href=""><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" alt="Image"></a>
            <p>{!! trans('label.price') !!}<b>{{ $product->price }} $</b></p>
            <p>{!! trans('label.date_port') !!}<b>{{ $product->created_at }}</b></p>
            </div>
            <div class="panel-footer">
                <a href=""><button class="book"><i class="glyphicon glyphicon-shopping-cart"></i>{!! trans('label.book') !!}</button></a>
                <a href=""><button class="btn btn-default btn-share"><i class="glyphicon glyphicon-send"></i>{!! trans('label.share') !!}</button></a>
                <a href=""><button class="vote"><i class="glyphicon glyphicon-thumbs-up"></i>{!! trans('label.vote') !!}</button></a>
            </div>
          </div>
        </div>
        @endforeach
    </div>
    <div class="clearfix"></div>
    <div class="load-more"><button><a href="{{ url('product') }}">{!! trans('label.load_more') !!}</a></button></div>
</div><br>

<div id="event" class="event"><div class="row"><div class="col-sm-12"><div class="panel panel-primary"><div class="panel-heading">{!! trans('header.event') !!}</div></div></div></div></div>
<div class="container">    
<div class="container">    
    <div class="row">
        @foreach($events as $event)
        <div class="col-sm-3">
          <div class="panel panel-primary">
            <div class="panel-heading">{{ str_limit($event->title, $limit = config('constants.STR_LIMIT'), $end = trans('label.end')) }}</div>
            <div class="panel-body">
            <a href=""><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" alt="Image"></a>
            <p>{!! trans('event.start_time') !!}<b>{{ $event->start_time }}</b></p>
            <p>{!! trans('event.end_time') !!}<b>{{ $event->end_time }}</b></p>
            </div>
            <div class="panel-footer">
                <a href="{{ url('event/'.$event->id.'/join') }}" ><button class="btn btn-default btn-join" alt="{{ trans('event.join_event') }}" ><i class="glyphicon glyphicon-shopping-cart"></i>{!! trans('label.join') !!}</button></a>
                <a href="#"><button class="btn btn-default btn-share"><i class="glyphicon glyphicon-send"></i>{!! trans('label.share') !!}</button></a>
            </div>
          </div>
        </div>
        @endforeach
    </div>
    <div class="clearfix"></div>
    <div class="load-more"><button>{!! trans('label.load_more') !!}</button></div>
    </div>
</div><br>

@include('include.footer')
