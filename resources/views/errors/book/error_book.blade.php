@include('include.header')
<div id="book-page" class="container">
	<div class="page-header">
        <h2>{{ trans('book.book_app') }}</h2>
    </div>
    <p><span class="glyphicon glyphicon-alert" aria-hidden="true"></span>{{ trans('book.error_result') }}</p>
    <p><a href="/">{{ trans('book.home') }}</a></p>
</div>
@include('include.footer')