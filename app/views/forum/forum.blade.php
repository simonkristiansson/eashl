@extends('layouts/forum')

@section('leftcontent')
	<div class="page-header">
	<h1> {{ Site::name() }} forums </h1>
</div>





@foreach($categories as $category)

@if($category->access === "guest")
<table class="table table-striped table-bordered table-hover">
        <thead>
    <tr>
        <th class="thread-top" colspan="3">{{ $category->name }}</th>
    </tr>
    </thead>
    

	    <tbody>
		     @foreach( $category->subs as $sub)
		    <tr>
		    	<td>
		    		<b> <a href="{{ URL::route('forum.sub', $sub->id) }}">{{ $sub->name }}</a></b><br>
		    		<i class="hidden-phone"> {{ $sub->description }}</i>
		    	</td>
		    	<td width="140px"class="text-right hidden-xs">
		    		34 minutes ago<br>
		    		by <b>esskay</b>    	</td>
		    </tr>
		    @endforeach
		</tbody>
</table>
@elseif(Sentry::check() && Sentry::getUser()->hasAccess($category->access))
<table class="table table-striped table-bordered table-hover">
        <thead>
    <tr>
        <th class="thread-top" colspan="3">{{ $category->name }}</th>
    </tr>
    </thead>
    

	    <tbody>
		     @foreach( $category->subs as $sub)
		    <tr>
		    	<td>
		    		<b> <a href="{{ URL::route('forum.sub', $sub->id) }}">{{ $sub->name }}</a></b><br>
		    		<i class="hidden-phone"> {{ $sub->description }}</i>
		    	</td>
		    	<td width="140px" class="text-right hidden-xs">
		    		34 minutes ago<br>
		    		by <b>esskay</b>    	</td>
		    </tr>
		    @endforeach
		</tbody>
</table>

@endif

@endforeach
@stop
