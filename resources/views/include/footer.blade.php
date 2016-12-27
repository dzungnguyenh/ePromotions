<!-- Footer -->
<div class="footer">
	<div class="container">
		<div class="clearfix"></div>
			<div class="footer-bottom">
				<h2 ><a href="index.html"><b>{{trans('header.logo_1')}}<br>{{trans('header.logo_2')}}<br>{{trans('header.logo_3')}}</b>{{trans('header.name_web')}}<span>{{trans('header.slogan')}}</span></a></h2>
				<p>{{trans('header.name_web')}}</p>
				<ul class="social-fo">
					<li><a href="#" class=" face"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
					<li><a href="#" class=" twi"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
					<li><a href="#" class=" goo"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
				</ul>
				<div class=" address">
					<div class="col-md-4 fo-grid1">
							<p><i class="fa fa-home" aria-hidden="true"></i>{{trans('header.contact_address')}}</p>
					</div>
					<div class="col-md-4 fo-grid1">
							<p><i class="fa fa-phone" aria-hidden="true"></i>{{trans('header.contact_phone')}}</p>
					</div>
					<div class="col-md-4 fo-grid1">
						<p><a href="{{trans('header.contact_mail')}}"><i class="fa fa-envelope-o" aria-hidden="true"></i>{{trans('header.contact_mail')}}</a></p>
					</div>
					<div class="clearfix"></div>
					</div>
			</div>
		<div class="copy-right">
			<p> &copy; {{trans('header.copyright')}}<a href="{{ trans('header.link_copyright') }}">{{ trans('header.link') }}</a></p>
		</div>
	</div>
</div>
</body>
</html>
<!-- js -->
<script src="{{asset('/bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js')}}"></script>
<!--  -->
<script type="text/javascript" src="/js/style_admin.js"></script>
<script type="text/javascript" src="/js/style_public.js"></script>
<script type="text/javascript" src="{{asset('js/index_product.js')}}"></script>
<script type="text/javascript" src="/js/share.js"></script>
