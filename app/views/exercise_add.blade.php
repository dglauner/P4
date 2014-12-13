@extends('_master')

@section('title')
	Fitness Tracker
@stop

@section('page_title')
	Fitness Tracker: Add New Exercise
@stop


@section('content')
<div class="jumbotron">
<h2>Add An Exercise</h2>
		{{ Form::open(array('url' => '/exercise/add')) }}
		
			{{ Form::label('title','Add New Exercise:') }}
			{{ Form::text('title'); }}
				
		    {{ Form::submit('Submit') }}
		
		{{ Form::close() }}
		<a href="/exercise/index" class="btn btn-default">Cancel</a>
</div>
@stop