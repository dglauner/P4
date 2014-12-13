@extends('_master')

@section('title')
	Fitness Tracker<br/>
	Your Exercises<br/>
	@if(Auth::check())
	    Welcome Back {{ Auth::user()->email; }}
	@endif

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
		    		<button class="btn btn-large btn-block btn-primary" type="button">{{$exercise['desc']}}</button>
		    	</td>
		    	<td>
				    @foreach($exercise->categories as $category)	
				    	<button class="btn btn-large btn-primary disabled">{{$category['desc']}}</button>
				    @endforeach
			    </td>
			</tr>
		    @endforeach
		
	</tbody>
</table>
<a href="/exercise/add" class="btn btn-default">Add New Exercise</a>

</div>
@stop