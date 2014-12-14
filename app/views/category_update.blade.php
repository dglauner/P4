@extends('_master')

@section('title')
	Fitness Tracker
@stop

@section('page_title')
	Fitness Tracker: Edit Exercise Name
@stop


@section('content')
<div class="jumbotron">
<h2>Update A Category</h2>
		{{ Form::open(array('url' => '/category/update')) }}
		
			{{ Form::hidden('id',$id); }}
			
			{{ Form::label('desc','Update Catagory:') }}
			{{ Form::text('desc', $exercise['desc']) }}
				
		    {{ Form::submit('Submit') }}
		
		{{ Form::close() }}
		<a href="/exercise/index" class="btn btn-default">Cancel</a>
</div>
@stop