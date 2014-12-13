@extends('_master')

@section('title')
	Log in
@stop

@section('content')

	@foreach($errors->all() as $message)
		<div class='error'>{{ $message }}</div>
	@endforeach

	{{Form::open(['url' => '/login', 'method' => 'post', 'class' => 'form-horizontal'])}}  
		<div class="control-group">
			{{Form::label('email', 'E-Mail Address', array('class' => 'control-label'))}}
			<div class="controls">
				{{Form::email('email', '', array('class' => 'form-control', 'placeholder' => 'Email'))}}
			</div>
		</div>
		<div class="control-group">
		{{Form::label('password', 'password', array('class' => 'control-label'))}}
			<div class="controls">
				{{Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password'))}}
			</div>
		</div>
		<div class="control-group">
			<div class="controls">
				{{Form::submit('Login', array('class' => 'btn'))}}
			</div>
		</div>
	{{Form::close()}}
	
	
	
@stop