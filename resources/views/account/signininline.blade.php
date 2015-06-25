<form action="{{ URL::route('account-sign-in-post') }}" method="POST">
	<div class="input-group margin-bottom-sm" style="margin-bottom: 6px;">
		<span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
		<input class="form-control" type="text" placeholder="Email address" name="email">
	</div>

	<div class="input-group" style="margin-bottom: 9px;">
		<span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
		<input class="form-control" type="password" placeholder="Password" name="password">
	</div>
	<!-- <div class="checkbox">
		<label>
			<input type="checkbox"> Remember me
		</label>
	</div> -->
	<div class="input-group">
		<button class="btn btn-info" type="submit">
			Submit
		</button>
	</div>
	{{ Form::token() }}
</form>