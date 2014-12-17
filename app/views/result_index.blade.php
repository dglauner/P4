@extends('_master')

@section('title')
	Fitness Tracker: Add or Edit Results
@stop

@section('content')
<div class="jumbotron">
	<h2>Result Data for {{$exercise['desc']}}</h2>
	<table class="table">
		<thead>
			<tr>
				<td>Date</td>
				<td>Weight</td>
				<td>Sets</td>
				<td>Reps</td>
				<td>&nbsp;</td>
			</tr>
		</thead>
		<tbody>
		    @foreach($exercise->results->sortByDesc('work_out_date') as $result)	
			    <tr>
					<td>{{{date("m/d/Y", strtotime($result['work_out_date']))}}}</td>
					<td>{{{$result['weight']}}}</td>
					<td>{{{$result['sets']}}}</td>
					<td>{{{$result['reps']}}}</td>
					<td>
						<a href="/result/update?eid={{$exercise['id']}}&rid={{$result['id']}}" class="btn btn-default">Edit</a>
						
						<a href="/result/delete?eid={{$exercise['id']}}&rid={{$result['id']}}" class="btn btn-default">Delete</a>					
					</td>
				</tr>
		    @endforeach   
		</tbody>
	</table>
<a href="/exercise/index" class="btn btn-default">Cancel</a>
<a href="/result/add/{{$exercise['id']}}" class="btn btn-default">Add New</a>
</div>
@stop
