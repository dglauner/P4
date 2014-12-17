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
						{{ Form::open(array('url' => '/result/update','method' => 'GET')) }}
							{{ Form::hidden('eid',$exercise['id']) }}
							{{ Form::hidden('rid',$result['id']) }}
	
						    {{ Form::submit('Edit', array('class' => 'btn btn-default')) }}
						{{ Form::close() }}
					</td>
				</tr>
		    @endforeach   
		</tbody>
	</table>
<a href="/exercise/index" class="btn btn-default">Cancel</a>
<a href="/result/add/{{$exercise['id']}}" class="btn btn-default">Add New</a>
</div>
@stop
