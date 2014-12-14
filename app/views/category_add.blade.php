@extends('_master')

@section('title')
	Fitness Tracker
@stop

@section('page_title')
	Fitness Tracker: Add New Exercise
@stop


@section('content')
<div class="jumbotron">
<h2>Add A Category</h2>
<table class="table">
	@foreach($categories as $category)
		<tr><td><a href="/category/delete/{{$category['id']}}" class="btn btn-default">Delete</a>&nbsp;{{$category['desc']}}</td></tr>
 	@endforeach
	<tr>
	<td>
		{{ Form::open(array('url' => '/category/add')) }}
		
			{{ Form::label('desc','New Category:') }}
			{{ Form::text('desc'); }}
				
		    {{ Form::submit('Save' , array('class' => 'btn btn-default')) }}
			<a href="/exercise/index" class="btn btn-default">Cancel</a>

		{{ Form::close() }}

		</td>
	</tr>
</table>		
</div>
@stop