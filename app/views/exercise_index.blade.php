@extends('_master')

@section('title')
	Fitness Tracker
@stop

@section('content')
<div class="jumbotron">
<h2>View Your Exercises</h2>

<table class="table table-bordered">
	<thead>
		<tr>
			<td>Exercise</td>
			<td>Delete</td>
			<td>Categories</td>
			<td>Recent Results</td>
		</tr>
	</thead>
	<tbody>
		
		    @foreach($exercises as $exercise)
		    <tr id="row{{$exercise['id']}}">	
		    	<td>
		    		<a title="Edit This Exercise" href="/exercise/edit/{{$exercise['id']}}" class="btn  btn-block btn-primary">{{{$exercise['desc']}}}</a>
		    		
		    	</td>
		    	<td>
		    		{{ Form::token() }}
		    		<a id="AjaxDelete{{$exercise['id']}}" title="Delete" class="btn btn-default">Delete</a>
		    	</td>
		    	<td>
				    @foreach($exercise->categories as $category)	
				    	<button class="btn btn-large btn-primary disabled">{{{$category['desc']}}}</button>
				    @endforeach
				    <a title="Set Categories For This Exercise" href="/category/edit/{{$exercise['id']}}" class="btn btn-default">Set</a>
			    </td>
			    <td><a title="Add or Edit Results for this exercise" href="/result/index/{{$exercise['id']}}" class="btn btn-default btn-block">
			    	@if($exercise->results->count() > 0)
					    Date: {{ date('m/d/Y', strtotime($exercise->results->sortByDesc('work_out_date')->first()['work_out_date']))}}<br/>
				    	Weight:{{$exercise->results->first()['weight']}}<br/>
				    	Sets:{{$exercise->results->first()['sets']}}<br/>
				    	Reps:{{$exercise->results->first()['reps']}}</a>
			    	@else
			    		Click to add Results!
			    	@endif
			    </td>
			</tr>
		    @endforeach
		
	</tbody>
</table>
<a title="Add A New Exercise" href="/exercise/add" class="btn btn-default">Add New Exercise</a>
<a title="Add A New Category" href="/category/add" class="btn btn-default">Add/edit Categories</a>
</div>
@stop

@section('/body')
    
    <script src="/js/search.js"></script>

@stop

