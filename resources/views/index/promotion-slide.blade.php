<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="{{ trans('promotion.indicator_one') }}" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="{{ trans('promotion.indicator_two') }}"></li>
    <li data-target="#carousel-example-generic" data-slide-to="{{ trans('promotion.indicator_three') }}"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
  @php 
    $isFirst = true; 
  @endphp
  @foreach($promotionSlide as $val)
  <div class="item{{{ $isFirst ? ' active' : '' }}}">
     <img src="{{ URL::to('/') .DIRECTORY_SEPARATOR.config('promotion.IMAGE_PATH'). $val->image }}" alt="{{ trans('promotion.alt_image') }}">
      <div class="carousel-caption">
        <h3>{{ $val->title }}</h3>
        <p>{{ $val->description }}</p>
        <p>{{ trans('promotion.date_start') }} : {{ $val->date_start }} - {{ trans('promotion.date_end') }} : {{ $val->date_end }}</p>
      </div>
  </div>
  @php 
    $isFirst = false; 
  @endphp
  @endforeach

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
  </a>
</div>
