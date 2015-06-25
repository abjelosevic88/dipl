<!DOCTYPE html>
<html>
	<head>
		@yield('metadata')

		<!--<meta name="viewport" content="width=device-width, initial-scale=1.0">-->

		<!-- Bootstrap core CSS -->
		{!! HTML::style('css/bootstrap.min.css') !!}
        {!! HTML::style('css/font-awesome.min.css') !!}

	    <!-- JQuery -->
	     {!! HTML::script('js/jquery.min.js') !!}

	    <!-- Sliders CSS -->
        {{--{!! HTML::style('css/sliders.css') !!}--}}

	    <!-- Add custom CSS here -->
        {!! HTML::style('css/main.css') !!}
        {!! HTML::style('css/blog-home.css') !!}
        {!! HTML::style('css/blog-post.css') !!}

	    @yield('head-style')

	    @yield('head-script')

	</head>
	<body>

		@if(Session::has('global'))
			<div class="container">
	            <div class="alert alert-info">
	              <p class="lead text-center text-info">{!! Session::get('global') !!}</p>
	            </div>
	        </div>
		@endif

		@if(Session::has('404'))
			<h2>
			    <span class="col-lg-12 text-center help-block alert-danger">
			        {!! Session::get('404') !!}
			    </span>
			</h2>
		@endif

		@if (Session::has('msg-success'))
			<div class="container">
	            <div class="alert alert-success">
	              <p class="lead text-center text-success">{!! Session::get('msg-success') !!}</p>
	            </div>
	        </div>
		@endif

		@if (Session::has('msg-error'))
			<div class="container">
	            <div class="">
	            @if($errors->any())
					<div class="alert alert-danger">
						<a href="#" class="close" data-dismiss="alert">&times;</a>
						{!! implode('', $errors->all('<li class="error">:message</li>')) !!}
					</div>
				@endif
	             <!-- <p class="lead text-center text-danger">{!! Session::get('msg-error') !!}</p> -->
	            </div>
	        </div>
		@endif


		@include('layout.navigation')

		@yield('content')

		<br>
	    @include('layout.footer-nav')

        {!! HTML::script('js/bootstrap.min.js') !!}

		<!-- JQuery tooltip selector -->
    	<script type="text/javascript">
	    	$(function () {
	    		$('body').tooltip({
				    selector: '[rel=tooltip]'
				});
	    	});
	    </script>

    	<!-- Sliders JQuery -->
    	{!! HTML::script('js/jquery.slides.min.js') !!}
	</body>
</html>