@extends('_master')

@section('title')
	Fitness Tracker
@stop

@section('page_title')
	Fitness Tracker: Edit Categories
@stop


@section('content')
	<div class="jumbotron">
	
		<h2>Edit Categories</h2>
		{{ Form::open(array('url' => '/category/edit')) }}
			<input type="hidden" name="cats[]" value="-1"/>
			<input type="hidden" name="exId" value="{{ $exercise['id'] }}"/>
			<div class="control-group">
			@foreach($categories as $category)
			  <div class="checkbox">
			    <label>
			      <input type='checkbox' {{ $category['checked'] }} value='{{ $category['id'] }}' name='cats[]'/> {{ $category['desc'] }}
			    </label>
			  </div>
			@endforeach	
			</div>
		    {{ Form::submit('Save', array('class' => 'btn btn-default')) }}
			<a href="/exercise/index" class="btn btn-default">Cancel</a>
		{{ Form::close() }}
		<br/>
		
	</div>
@stop

