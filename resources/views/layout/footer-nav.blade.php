<div class="navbar navbar-default navbar-fixed-bottom">
	<div class="container">
		<p class="navbar-text pull-left">© 2014 Site powered by Laravel™</p>
		<form class="pull-right" method="POST" action="{{ URL::route('account-subscribe') }}">
			<input class="form-control bottom-nav-email" type="text" name="sub_email" placeholder="Subscribe..." />
			{!! Form::token() !!}
		</form>
	</div>
</div>