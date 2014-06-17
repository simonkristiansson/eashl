@extends('layouts/tournament')

@section('leftcontent')

	@foreach($errors->all('<li>:message</li>') as $error)
		{{ $error }}
	@endforeach

        	
<form action="" method="POST" role="form" enctype="multipart/form-data">
	<legend>Create new tournament</legend>

	<div class="form-group">
		<label for="">Tournament name</label>
		{{Form::text('name', Input::old('name'), 
			array(
				'class' => 'form-control input',
			));		
		}}
	</div>

	<div class="form-group">
		<label for="">Tournament image (recommended is 660x300)</label>
		{{Form::file('image', Input::old('image'));}}
		
	</div>

	<div class="form-group">
		<label for="">Console</label>

		{{ Form::select('console', $console_list, Input::old('console'), 
			array(
				'class' => 'form-control input',
			));
		}}



	</div>

	<div class="form-group">

		<label for="">Start date</label>
		{{Form::text('start_date', Input::old('start_date'), 
			array(
				'class' => 'form-control input',
			));		
		}}

	</div>



	<div class="form-group">

		<label for="">End date</label>
		{{Form::text('end_date', Input::old('end_date'), 
			array(
				'class' => 'form-control input',
			));
		}}

	</div>

	<div class="form-group">

		<label for="">Default game days</label>
		 <div class="checkbox">
		    <label>
		      {{Form::checkbox('game_days', 'monday', false);}} Mondays
		    </label>
		  </div>
		 <div class="checkbox">
		    <label>
		      {{Form::checkbox('game_days', 'tuesday', false);}} Tuesdays
		    </label>
		  </div>
		 <div class="checkbox">
		    <label>
		      {{Form::checkbox('game_days', 'wednsday', false);}} Wednsdays
		    </label>
		  </div>
		 <div class="checkbox">
		    <label>
		      {{Form::checkbox('game_days', 'thursday', false);}} Thursdays
		    </label>
		  </div>
		 <div class="checkbox">
		    <label>
		      {{Form::checkbox('game_days', 'friday', false);}} Fridays
		    </label>
		  </div>
		 <div class="checkbox">
		    <label>
		      {{Form::checkbox('game_days', 'saturday', false);}} Saturdays
		    </label>
		  </div>
		 <div class="checkbox">
		    <label>
		      {{Form::checkbox('game_days', 'sunday', false);}} Sundays
		    </label>
		  </div>

	</div>

	<div class="form-group">

		<label for="">Default game time CET (Swedish time)</label>
		{{Form::text('default_time', Input::old('default_time'), 
			array(
				'class' => 'form-control input',
			));
		}}

	</div>


	<div class="form-group">

		<label for="">Maximum number of players in each team</label>
		{{Form::text('max_players', Input::old('max_players'), 
			array(
				'class' => 'form-control input',
			));
		}}

	</div>

	<div class="form-group">

		<label for="">Amount of games versus each team</label>
		{{Form::text('games', Input::old('games'), 
			array(
				'class' => 'form-control input',
			));
		}}

	</div>




	

	<button type="submit" class="btn btn-primary">Submit</button>
</form>
@stop