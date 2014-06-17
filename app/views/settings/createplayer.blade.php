@extends('layouts/settings')

@section('leftcontent')
	
	@if('first_player')
		<div class="alert alert-danger fade in">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4>Oh snap! You have not created a player profile yet!</h4>
      <p>Good thing I'm such a nice person and redirected you to the create player form! </p>
      <p>The fields marked with an asterisk (*) are required.</p>
     <br>
        
        <button type="button" class="btn btn-primary" data-dismiss="alert">Okay, got it!</button>
          </div>


	@endif
	<div class="page-header">
		<h1>Create new player</h1>
	</div>


@stop
