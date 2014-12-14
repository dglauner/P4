@extends('_master')

@section('title')
	Fitness Tracker
@stop

@section('page_title')
	Fitness Tracker: Edit Exercise Name
@stop


@section('content')
<div class="jumbotron">
<h2>Edit An Exercise</h2>
		{{ Form::open(array('url' => '/exercise/edit')) }}
		
			{{ Form::hidden('id',$exercise['id']); }}
			
			{{ Form::label('desc','Edit Exercise:') }}
			{{ Form::text('desc', $exercise['desc']) }}
				
		    {{ Form::submit('Submit') }}
		
		{{ Form::close() }}
		<a href="/exercise/index" class="btn btn-default">Cancel</a>
</div>
@stop