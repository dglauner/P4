@extends('_master')

@section('title')
	Fitness Tracker: Add or Edit Results
@stop

@section('content')
<div class="jumbotron">
	{{ Form::open(array('url' => '/result/add')) }}		
		{{ Form::hidden('id',$exercise['id']) }}
		<table><tr>
		<td class="text-right">{{ Form::label('work_out_date','Work Out Date:') }}&nbsp;</td>
		<td>{{ Form::text('work_out_date') }}</td>
		</tr><tr>
		<td class="text-right">{{ Form::label('weight','Weight:') }}&nbsp;</td>
		<td>{{ Form::text('weight') }}</td>
		</tr><tr>
		<td class="text-right">{{ Form::label('sets','Sets:') }}&nbsp;</td>
		<td>{{ Form::text('sets') }}</td>
		</tr><tr>
		<td class="text-right">{{ Form::label('reps','Reps:') }}&nbsp;</td>
		<td>{{ Form::text('reps') }}</td>
		</tr>
		</table>
		<br/><br/>
		<a href="/result/index/{{$exercise['id']}}" class="btn btn-default">Cancel</a>
	    {{ Form::submit('Save', array('class' => 'btn btn-default')) }}
	    
	{{ Form::close() }}

</div>
@stop
