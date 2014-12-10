@extends('_master')

@section('title')
	Sign Up
@stop

@section('content')
	<div class="jumbotron">
			
		{{ Form::open(array('url' => '/signup')) }}
		
		    Email<br>
		    {{ Form::text('email') }}<br><br>
		
		    Password:<br>
		    {{ Form::password('password') }}<br><br>
		
		    {{ Form::submit('Submit') }}
		
		{{ Form::close() }}
	</div>
@stop


