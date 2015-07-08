@extends("layout.main")

@section("content")
	<div class="container">
		{{ die("<pre>".print_r($users, true)."</pre>") }}
	</div>
@stop