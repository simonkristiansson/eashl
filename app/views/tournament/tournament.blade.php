@extends('layouts/admin')

@section('leftcontent')

<div class="row">
<div class="page-header">
	<h2>Ongoing Tournaments</h2>
</div>

@foreach($tournaments as $tournament)
<div class="col-md-6">
	<div class="well well-tournament">
		<div class="tournament-thumb tournament-{{$tournament->id}}" data-url="{{asset('images/tournament/' . $tournament->image)}}">
			
		</div>
		<h4>{{$tournament->name}}</h4>
	</div>
</div>
@endforeach
</div>


<div class="row">
<div class="page-header">
	<h2>Finnished Tournaments</h2>
</div>

<div class="col-md-4">
	<div class="well well-tournament">
		<div class="tournament-thumb-small">
			<img src="http://lorempixel.com/330/150/sports/5"/>
		</div>
		<p>Webhallen Open</p>
	</div>
</div>
<div class="col-md-4">
	<div class="well well-tournament">
		<div class="tournament-thumb-small">
			<img src="http://lorempixel.com/330/150/sports/2"/>
		</div>
		<p>Webhallen Open</p>
	</div>
</div>
<div class="col-md-4">
	<div class="well well-tournament">
		<div class="tournament-thumb-small">
			<img src="http://lorempixel.com/330/150/sports/6"/>
		</div>
		<p>Webhallen Open</p>
	</div>
</div>
<div class="col-md-4">
	<div class="well well-tournament">
		<div class="tournament-thumb-small">
			<img src="http://lorempixel.com/330/150/sports/5"/>
		</div>
		<p>Webhallen Open</p>
	</div>
</div>

</div>

@stop

@section('script')
	{{HTML::script('js/jquery.backstretch.min.js')}}
	{{HTML::script('js/jquery.visible.js')}}

	<script>
	$(document).ready(function() {
		$.each($(".tournament-thumb"), function() {
		 $(this).backstretch($(this).data("url"));
		});

	});

	 </script>
@stop