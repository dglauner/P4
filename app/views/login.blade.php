@extends('_master')

@section('title')
	Log in
@stop

@section('content')

<div class="jumbotron">
<h3>Please Log In To Your Account</h3>
	{{Form::open(['url' => '/login', 'method' => 'post', 'class' => 'form-horizontal'])}}  
	    {{Form::label('email', 'E-Mail Address')}}<br/>
		{{Form::email('email', '', array('placeholder' => 'Email'))}}
		<br/>
		{{Form::label('password', 'password')}}<br/>
		{{Form::password('password', array('placeholder' => 'Password'))}}
		<br/><br/>
		{{Form::submit('Login', array('class' => 'btn btn-default'))}}
	{{Form::close()}}
</div>	
@stop