@extends('layouts/team')

@section('leftcontent')

	<div class="page-header">
		<h1>Teams</h1>
	</div>
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th>Name</th>
			</tr>
		</thead>
		<tbody>
			@foreach($teams as $team)
				<td>{{$team->name}}</td>
			@endforeach
		</tbody>
	</table>
	
@stop