@extends('_master')

@section('title')
	Log in
@stop

@section('content')

	@foreach($errors->all() as $message)
		<div class='error'>{{ $message }}</div>
	@endforeach


	{{ Form::open(array('url' => '/login')) }}
	
	    Email<br>
	    {{ Form::text('email') }}<br><br>
	
	    Password:<br>
	    {{ Form::password('password') }}<br><br>
	
	    {{ Form::submit('Submit') }}
	
	{{ Form::close() }}
@stop