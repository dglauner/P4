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
			<td>Categories</td>
		</tr>
	</thead>
	<tbody>
		
		    @foreach($exercises as $exercise)
		    <tr>	
		    	<td>
		    		<a title="Edit This Exercise" href="/exercise/edit/{{$exercise['id']}}" class="btn btn-large btn-block btn-primary">{{$exercise['desc']}}</a>
		    	</td>
		    	<td>
				    @foreach($exercise->categories as $category)	
				    	<button class="btn btn-large btn-primary disabled">{{$category['desc']}}</button>
				    @endforeach
				    <a title="Set Categories For This Exercise" href="/category/edit/{{$exercise['id']}}" class="btn btn-default">Set</a>
			    </td>
			</tr>
		    @endforeach
		
	</tbody>
</table>
<a title="Add A New Exercise" href="/exercise/add" class="btn btn-default">Add New Exercise</a>

</div>
@stop