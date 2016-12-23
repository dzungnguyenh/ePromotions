<!--banner-->
<div class="banner-top" style="margin-bottom: 100px">
 <div class="container">
	 <h3 >{{trans('header.search')}}</h3>
	{!! Form::open([ 'route' => 'research', 'method' => 'get']) !!}
	 <div class="col-sm-5">
		 {!! Form::select('category_name', trans('header.array_search'), null, ['class' => 'form-control select']) !!}
	 </div>
	 <div class="col-md-5">
  	 <div class="input-group">
			 {!! Form::text('search', null, ['class' => 'form-control', 'placeholder' => trans('header.search').'...']) !!}
			 <span class="input-group-btn">
				 {{ Form::button('<i class="fa fa-search"></i>', array('class'=>'btn btn-flat', 'type'=>'submit', 'method' => 'POST')) }}
			 </span>
  	 </div>
	 </div>
	 {!! Form::close() !!}
	 <div class="clearfix"> </div>
 </div>
</div>