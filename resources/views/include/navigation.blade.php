<nav class="navbar navbar-default">

  <div class="navbar-header nav_2">
    <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
      <span class="sr-only"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
  </div>

  <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
    <ul class="nav navbar-nav ">
      <li class=" active"><a href="{{ url('/') }}" class="hyper "><span>Home</span></a></li>
      @foreach ($categories as $key => $category)
        <li class="dropdown ">
          <a href="{!! url('/filter', $category->id) !!}" class="dropdown-toggle hyper" data-toggle="dropdown" ><span>{{ $category->name }}<b class="caret"></b></span></a>
          <ul class="dropdown-menu multi">
            <div class="row">
              <ul class="multi-column-dropdown">
                @foreach ($childs[$key] as $row)
                  <li>
                    {{-- {!! route('/category', [$row->id]) !!} --}}
                    <a href="/filter/{{ $row->id }}">
                      <i class="fa fa-angle-right" aria-hidden="true"></i>
                      {{ $row->name }}
                    </a>
                  </li>
                @endforeach
              </ul>
              <div class="clearfix"></div>
            </div>
          </ul>
        </li>
      @endforeach
    </ul>

  </div>
</nav>
