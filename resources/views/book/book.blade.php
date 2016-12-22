@include('include.header')
<div id="book-page" class="container">
	<div class="page-header">
        <h2>{{ trans('book.book_app') }}</h2>
    </div>
    @if (Session::has('message') && session()->has('bookId'))
        <div class="alert alert-info alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <p>{{ Session::get('message') }}</p>
            <p>{{ trans('book.notification_success_before').Session('bookId').trans('book.notification_success_after')}}</p>
        </div>
    @endif
    <form action="{{ route('book.store') }}" method="post" id="form-booking">
    {{ csrf_field() }}
    <div class="product-detail">
    <h3>{{ trans('book.book_detail') }}</h3>
         <table class="table table-bordered">
            <tr>
            	<th>{{ trans('book.th_image') }}</th>
                <th>{{ trans('book.th_name') }}</th>
                <th>{{ trans('book.th_description') }}</th>
                <th>{{ trans('book.th_price') }}</th> 
                <th>{{ trans('book.th_quantity') }}</th>
                <th>{{ trans('book.th_total') }}</th>
            </tr>
            @foreach($product as $value)
            <tr>
            	<td><img src="{{ $value->picture }}" alt="Product image"></td>
                <td>{{ str_limit($value->product_name, 50) }}</td>
                <td>{{ str_limit($value->description, 100) }}</td>
                <td ><input type="number" name="unit_price" class="price text-right" id="unit_price" value="{{ $value->price }}" readonly/><span>{{ trans('book.code_price') }}</span></td> 
                <td>
                    <input type="number" min="0" class="quantity text-center" id="quantity" name="quantity" value="{{ trans('book.default_quantity') }}" />
                </td>
                <td><input type="number" class="price text-right" name="price" id="price" value="{{ $value->price }}" readonly/><span>{{ trans('book.code_price') }}</span></td>
            </tr>
            <input type="hidden" name="product_id" value="{{ $value->id }}">
            @endforeach
        </table>
        <p class="text-right error-quantity"><span id="error-quantity"></span></p>
    </div>
    <div class="row">
        <div class="user-detail col-md-6">
    		<h3>{{ trans('book.customer_detail') }}</h3>	
            <address>
                 <strong>{{ trans('book.address_name') }}</strong><br>
                 <p>{{ Auth::user()->name }}</p>
            </address>

            <address>
                 <strong>{{ trans('book.address_email') }}</strong><br>
                 <p>{{ Auth::user()->email }}</p>
            </address>

            <address>
                <strong>{{ trans('book.address_contacts') }}</strong><br>
                {{ Auth::user()->address }}<br>
                <abbr title="Phone">{{ trans('book.address_phone') }}</abbr> {{ Auth::user()->phone }}
            </address>
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" />
            <input type="hidden" name="status" value="{{ trans('book.default_status') }}" />
            <input type="hidden" name="book_id" />
            <button type="submit" class="btn btn-default">{{ trans('book.booking') }}</button>
        </div>
        <div class="rule col-md-6">
        	<h3>{{ trans('book.booking_guide_question') }}</h3>
        	<ol>
              <li>{{ trans('book.booking_guide_first') }}</li>
              <li>{{ trans('book.booking_guide_second') }}</li>
              <li>{{ trans('book.booking_guide_third') }}</li>
            </ol>
            <i><b>{{ trans('book.note_title') }}</b> {{ trans('book.note_content') }}</i>
        </div>
    </div>
    </form>
</div>
<script type="text/javascript">
    var error_quantity = '{!! trans('book.error_quantity') !!}';
</script>
<script type="text/javascript" src="{!! asset('js/book.js') !!}"></script>
@include('include.footer')