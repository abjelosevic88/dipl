@extends("layout.main")

@section("content")
	This is a user page. For user {{ e($user->username) }}
@stop