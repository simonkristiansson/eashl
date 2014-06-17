@extends('layouts/forum')

@section('leftcontent')



	<div class="page-header">

<ul class="breadcrumb" style="margin-bottom: 5px;">
    <li><a href="{{URL::route('forum')}}">Forum</a></li>
    <li><a href="{{URL::route('forum')}}">{{ForumCategory::find($sub->forum_category_id)->name}} </a></li>
    <li class="active">{{ $sub->name }}</a></li>
              </ul>

</div>

<div class=" col-md-12 pull-right forum-btns">
    <a href="{{ URL::route('forum.thread.new', $sub->id)}}" class="btn btn-primary btn-sm pull-right">New Thread</a>
</div>



<table class="table table-striped table-bordered table-hover">
        <thead>
    <tr>
        <th class="thread-top" colspan="3">Threads</th>
    </tr>
    </thead>
    

	    <tbody>
		    @foreach($sub->threads as $thread)

		    <tr>
		    	<td style="width: 99%">
		    		<b> <a href="{{URL::route('forum.thread', array($thread->id, Str::slug($thread->title)) )}}">{{ $thread->title }}</a></b><br>
		    	</td>
		    	<td class="text-right hidden-xs" style="white-space:nowrap">
		    		{{Site::timeAgo($thread->updated_at)}} <br>by <b>esskay</b>    	</td>
		    </tr>
		    @endforeach
		</tbody>
</table>	



@stop