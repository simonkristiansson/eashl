@extends('layouts/player')

@section('leftcontent')


	<div class="page-header">
		<h1>Players</h1>
	</div>
	<table class="table table-bordered table-hover">
		<thead>
			<tr>
				<th>Alias</th>
				<th>Platform</th>
			</tr>
		</thead>
		<tbody>
			@foreach($players as $player)
				<td>{{$player->alias}}</td>
				<td>{{$player->console->shortname}}</td>

			@endforeach
		</tbody>
	</table>
	

@stop