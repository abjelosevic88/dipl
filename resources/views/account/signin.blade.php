@extends('layout.auth')

@section('content')
	<div class="col-md-4 col-md-offset-4">
      <div class="panel panel-info">
        <div class="panel-heading">Please Login</div>
        <div class="panel-body">
            {!! Form::open(array('url' => URL::route('account-sign-in-post'), 'id' => 'formID')) !!}
            @if($errors->any())
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
                </div>
            @endif
            <div class="form-group">
                {!! Form::label('email', 'Email Address') !!}
                {!! Form::text('email', '', array('class' => 'form-control validate[required,custom[email]]', 'placeholder' => 'Email Address')) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password', 'Password') !!}
                {!! Form::password('password', array('class' => 'form-control validate[required]', 'placeholder' => 'Password')) !!}
            </div>
            <div class="checkbox">
                {!! Form::label('remember', 'Remember me', array('class' => 'remember-label')) !!}
                {!! Form::checkbox('remember', '', '', array('class' => '')) !!}
            </div
            <div class="form-group">
                {!! Form::submit('Login', array('class' => 'btn btn-success')) !!}
                {!! HTML::link(URL::route('home'), 'Cancel', array('class' => 'btn btn-danger')) !!}
            </div>
            {!! Form::close() !!}
        </div>
      </div>
	</div>
@stop
