@include('include.header')

<div id="promotion" class="promotion"><div class="row"><div class="col-sm-12"><div class="panel panel-primary"><div class="panel-heading">{!! trans('header.promotion') !!}</div></div></div></div></div>
<div class="container">    
    <div class="row">
        @foreach($promotions as $promotion)
        <div class="col-sm-3">
          <div class="panel panel-primary">
            <div class="panel-heading">{{ $promotion->title }}</div>
            <div class="panel-body">
            <a href=""><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" alt="Image"></a>
            <p>Price: <b>{{ $promotion->percent }} $</b></p>
            <p>Date post: {{ $promotion->created_at }} </p>
            </div>
            <div class="panel-footer">
                <a href="{{ route('book.show', $promotion->product_id) }}"><button class="book"><i class="glyphicon glyphicon-shopping-cart"></i> {!! trans('label.book') !!}</button></a>
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
            <div class="panel-heading">{{ $product->product_name }}</div>
            <div class="panel-body">
            <a href=""><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" alt="Image"></a>
            <p>Price: <b>{{ $product->price }} $</b></p>
            <p>Date post: {{ $product->created_at }} </p>
            </div>
            <div class="panel-footer">
                <a href="{{ route('book.show', $product->id) }}"><button class="book"><i class="glyphicon glyphicon-shopping-cart"></i>{!! trans('label.book') !!}</button></a>
                <a href=""><button class="share"><i class="glyphicon glyphicon-send"></i>{!! trans('label.share') !!}</button></a>
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
        <div class="col-sm-4">
          <div class="panel panel-primary">
            <div class="panel-heading">{{ $event->title }}</div>
            <div class="panel-body">
            <a href=""><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" alt="Image"></a>
            <p>Start time: <b>{{ $event->start_time }} $</b></p>
            <p>End time: {{ $event->end_time }} </p>
            </div>
            <div class="panel-footer">
                <a href=""><button class="book"><i class="glyphicon glyphicon-shopping-cart"></i>{!! trans('label.join') !!}</button></a>
                <a href=""><button class="share"><i class="glyphicon glyphicon-send"></i>{!! trans('label.share') !!}</button></a>
                <a href=""><button class="vote"><i class="glyphicon glyphicon-thumbs-up"></i>{!! trans('label.vote') !!}</button></a>
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
