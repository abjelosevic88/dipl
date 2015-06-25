@extends('layout.auth')

@section('content')
<!-- 	<form action="{!! URL::route('account-forgot-password-post') !!}" method="post">
	<div class="field">
		Email: <input type="text" name="email" {!! (Input::old('email')) ? 'value="' . e(Input::old('email')) . '"' : '' !!}/>
		@if($errors->has('email'))
			{!! $errors->first() !!}
		@endif
	</div>
	<input type="submit" value="Recover" />
	{!! Form::token() !!}
</form> -->

	<div class="col-md-4 col-md-offset-4">
	<div class="panel panel-info">
		<div class="panel-heading">Please enter your email below</div>
		<div class="panel-body">
			{!! Form::open(array('url' => URL::route('account-forgot-password-post'), 'id' => 'formID')) !!}
			@if($errors->any())
			<div class="alert alert-danger">
				<a href="#" class="close" data-dismiss="alert">&times;</a>
				{!! implode('', $errors->all('<li class="error">:message</li>')) !!}
			</div>
			@endif
			<div class="form-group">
				{!! Form::label('email', 'Email Address') !!}
				{!! Form::text('email', '', array('class' => 'form-control  validate[required,custom[email]]', 'placeholder' => 'Email Address')) !!}
			</div>
			<div class="form-group">
				{!! Form::submit('Recover', array('class' => 'btn btn-success')) !!}
				{!! HTML::link(URL::route('home'), 'Cancel', array('class' => 'btn btn-danger')) !!}
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@stop

