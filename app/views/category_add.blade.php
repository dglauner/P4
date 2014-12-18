@extends('_master')

@section('title')
	Fitness Tracker
@stop

@section('page_title')
	Fitness Tracker: Add/Edit New Category
@stop


@section('content')
<div class="jumbotron">
<h2>Add or Edit Categories</h2>
<table class="table">
	@foreach($categories as $category)
		<tr>
			<td>
				<a href="/category/update/{{$category['id']}}" class="btn btn-default">Edit</a>&nbsp;
				<a href="/category/delete/{{$category['id']}}" class="btn btn-default">Delete</a>&nbsp;&nbsp;&nbsp;<strong>{{{$category['desc']}}}</strong>
			</td>
		</tr>
 	@endforeach
	<tr>
		<td>
			{{ Form::open(array('url' => '/category/add')) }}
			
				{{ Form::label('desc','New Category:') }}
				{{ Form::text('desc','',array('autofocus')) }}
			    {{ Form::submit('Save' , array('class' => 'btn btn-default')) }}
	
			{{ Form::close() }}
		</td>
	</tr>
</table>
<a href="/exercise/index" class="btn btn-default">Cancel</a>		
</div>
@stop