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

	
	    @foreach($exercises as $exercise)	
	    	{{$exercise['desc']}}
		    @foreach($exercise->categories as $category)	
		    	{{$category['desc']}}
		    @endforeach

	    @endforeach

</div>
@stop