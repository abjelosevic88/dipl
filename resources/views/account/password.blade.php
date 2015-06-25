@extends('layout.auth')

@section('metadata')
	<title>Change password Page</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
@stop

@section('content')
	<div class="col-md-4 col-md-offset-4">
      <div class="panel panel-info">
        <div class="panel-heading">Please Login</div>
        <div class="panel-body">
            {!! Form::open(array('url' => URL::route('account-change-password-post'), 'id' => 'formID')) !!}
            @if($errors->any())
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    {!! implode('', $errors->all('<li class="error">:message</li>')) !!}
                </div>
            @endif
            <div class="form-group">
                {!! Form::label('old_password', 'Old password') !!}
                {!! Form::password('old_password', array('class' => 'form-control validate[required]', 'placeholder' => 'Old password')) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password', 'New password') !!}
                {!! Form::password('password', array('class' => 'form-control validate[required]', 'placeholder' => 'New password')) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password_again', 'New password again') !!}
                {!! Form::password('password_again', array('class' => 'form-control validate[required]', 'placeholder' => 'New password again')) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Change password', array('class' => 'btn btn-success')) !!}
                {!! HTML::link(URL::route('home'), 'Cancel', array('class' => 'btn btn-danger')) !!}
            </div>
            {!! Form::close() !!}
        </div>
      </div>
	</div>
@stop