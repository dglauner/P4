@extends('_master')

@section('title')
	Fitness Tracker
@stop

@section('content')
<div class="jumbotron">

<h1>Welcome to Fitness Tracker</h1>

			@if(Auth::check())
			    Welcome Back {{ Auth::user()->email; }}
			@else 
			    Click Signup to create an account
			@endif

	
</div>
@stop