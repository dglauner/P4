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
				<td></td>
			</tr>
		</thead>
		<tbody>
			<tr>
			    @foreach($exercise->results as $result)	
					<td>{{date("m/d/Y", strtotime($result['work_out_date']))}}  </td>
					<td>{{$result['weight']}}</td>
					<td>{{$result['sets']}}</td>
					<td>{{$result['reps']}}</td>
					<td>Edit</td>
			    @endforeach
			</tr>    
		</tbody>
	</table>



</div>
@stop
