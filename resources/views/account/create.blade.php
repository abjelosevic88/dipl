@extends('layout.auth')

@section('content')
<div class="col-md-4 col-md-offset-4">
	<div class="panel panel-info">
		<div class="panel-heading">Please Create an account</div>
		<div class="panel-body">
			{!! Form::open(array('url' => URL::route('account-create-post'), 'id' => 'formID')) !!}
			@if($errors->any())
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
                </div>
			@endif
			<div class="form-group">
                {!! Form::label('first_name', 'First Name') !!}
                {!! Form::text(
                        'first_name', '',
                        array(
                            'class' => "form-control validate[required, custom[onlyLetterSp]]",
                            'placeholder' => 'First name'
                        )
                ) !!}
            </div>
            <div class="form-group">
                {!! Form::label('last_name', 'Last Name') !!}
                {!! Form::text(
                        'last_name', '',
                        array(
                            'class' => "form-control validate[required, custom[onlyLetterSp]]",
                            'placeholder' => 'Last name'
                        )
                ) !!}
            </div>
			<div class="form-group">
				{!! Form::label('email', 'Email Address') !!}
				{!! Form::text(
                        'email', '',
                        array(
                            'class' => "form-control validate[required, custom[email]]",
                            'placeholder' => 'Email Address'
                        )
				) !!}
			</div>
			<div class="form-group">
				{!! Form::label('username', 'Username') !!}
				{!! Form::text(
				    'username', '',
				    array(
				        'class' => 'form-control validate[required]',
				        'placeholder' => 'Username'
				    )
				) !!}
			</div>
			<div class="form-group">
				{!! Form::label('password', 'Password') !!}
				{!! Form::password(
				    'password',
				    array(
				        'class' => 'form-control validate[required]',
				        'placeholder' => 'Password'
				    )
				) !!}
			</div>
			<div class="form-group">
				{!! Form::label('password_again', 'Password again') !!}
				{!! Form::password(
				    'password_again',
				    array(
				        'class' => 'form-control validate[required]',
				        'placeholder' => 'Password again'
				    )
				) !!}
			</div>
			<div class="form-group">
				{!! Form::submit('Create account', array('class' => 'btn btn-success')) !!}
				{!! HTML::link(URL::route('home'), 'Cancel', array('class' => 'btn btn-danger')) !!}
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>
@stop


