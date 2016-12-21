@if(Session::has('msg'))
  <span class="hidden" id="session-message">{{ Session::get('msg') }}</span>
@endif