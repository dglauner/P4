@extends('_master')

@section('title')
	Sign Up
@stop

@section('content')
	<div class="jumbotron">
			<h3>Please Create a New Account</h3>
		{{ Form::open(array('url' => '/signup')) }}
		
		    {{Form::label('email', 'E-Mail Address')}}
		    <br/>
		    {{ Form::text('email') }}
		    <br/><br/>
		    {{Form::label('password', 'password')}}
		    <br/>
		    {{ Form::password('password') }}
		    <br/><br/>
		    {{ Form::submit('Create My Account', array('class' => 'btn btn-default')) }}
		
		{{ Form::close() }}
	</div>
@stop


