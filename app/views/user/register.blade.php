@extends('layouts/home')

@section('content')


<div class="container">
	






{{ Form::open() }}
<div class="col-md-12">
	        	@foreach($errors->all('<li>:message</li>') as $error)
        		{{ $error }}
        	@endforeach
</div>
<div class="row">
<div class="form-group col-md-4">
<h3>Login Details</h3>

	{{ Form::text('email', Input::old('email'),
		array(
			'class' => 'input form-control',
			'placeholder' => 'email',
		))
	}}


	{{ Form::password('password',
		array(
			'class' => 'input form-control',
			'placeholder' => 'password',
		))
	}}

	{{ Form::password('password_confirmation',
		array(
			'class' => 'input form-control',
			'placeholder' => 'repeat password',
		))
	}}

</div>

<div class="form-group col-md-4">
	<h3>Your details</h3>

	{{ Form::text('alias', Input::old('alias'),
		array(
			'class' => 'input form-control',
			'placeholder' => 'alias'
		))
	}}

	{{ Form::text('first_name', Input::old('first_name'),
		array(
			'class' => 'input form-control',
			'placeholder' => 'first name'
		))
	}}

	{{ Form::text('last_name', Input::old('last_name'),
		array(
			'class' => 'input form-control',
			'placeholder' => 'last name'
		))
	}}
	
</div>
<div class="form-group col-md-4">
	<h3>Profiles</h3>

	{{ Form::text('xbox', Input::old('xbox'),
		array(
			'class' => 'input form-control',
			'placeholder' => 'Gamertag'
		))
	}}

	{{ Form::text('ps', Input::old('ps'),
		array(
			'class' => 'input form-control',
			'placeholder' => 'PSN'
		))
	}}

	
</div>
</div>
<div class="row col-md-12">
	{{ Form::submit('register',
		array(
			'class' => 'btn btn-primary',
		))
	}}
</div>

</div>

@stop