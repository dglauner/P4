@extends('_master')

@section('title')
	Fitness Tracker: Add or Edit Results
@stop

@section('content')
<div class="jumbotron">
	{{ Form::open(array('url' => '/result/update')) }}		
		{{ Form::hidden('id',$result['id']) }}
		{{ Form::hidden('eid',$eid) }}
		<table><tr>
		<td class="text-right">{{ Form::label('work_out_date','Work Out Date:') }}&nbsp;</td>
		<td>{{ Form::text('work_out_date', date('m/d/Y', strtotime($result['work_out_date']))) }}</td>
		</tr><tr>
		<td class="text-right">{{ Form::label('weight','Weight:') }}&nbsp;</td>
		<td>{{ Form::text('weight', $result['weight']) }}</td>
		</tr><tr>
		<td class="text-right">{{ Form::label('sets','Sets:') }}&nbsp;</td>
		<td>{{ Form::text('sets', $result['sets']) }}</td>
		</tr><tr>
		<td class="text-right">{{ Form::label('reps','Reps:') }}&nbsp;</td>
		<td>{{ Form::text('reps', $result['reps']) }}</td>
		</tr>
		</table>
		<br/><br/>
	    {{ Form::submit('Save', array('class' => 'btn btn-default')) }}
	    <a href="/result/index/{{$eid}}" class="btn btn-default">Cancel</a>
	{{ Form::close() }}

</div>
@stop
