@extends('_master')

@section('title')
	Fitness Tracker
@stop

@section('page_title')
	Fitness Tracker: Edit Category Name
@stop


@section('content')
<div class="jumbotron">
<h2>Update A Category</h2>
		{{ Form::open(array('url' => '/category/update')) }}
		
			{{ Form::hidden('id',$category['id']) }}
			
			{{ Form::label('desc','Update Catagory:') }}
			{{ Form::text('desc', $category['desc']) }}
				
		    {{ Form::submit('Submit', array('class' => 'btn btn-default')) }}
			<a href="/category/add" class="btn btn-default">Cancel</a>
		{{ Form::close() }}
		
</div>
@stop