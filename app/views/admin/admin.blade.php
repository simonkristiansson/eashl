@extends('layouts/admin')

@section('leftcontent')

	@if(Sentry::getUser()->hasAccess('admin'))
		<div class="page-header">
			<h3>Admin</h3>
		</div>

		<a href="{{URL::route('tournament.create')}}">Create tournament</a><br>
		<a href="{{URL::route('tournament.edit')}}">Edit tournaments</a>
	


	@endif


	@if(Sentry::getUser()->hasAccess('moderator'))
		<div class="page-header">
			<h3>Moderator</h3>
		</div>
	@endif



@stop