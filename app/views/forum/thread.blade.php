@extends('layouts/forum')
@section('title')
{{ $thread->title }}
@stop
@section('leftcontent')
	<div class="page-header">

<ul class="breadcrumb" style="margin-bottom: 5px;">
                <li><a href="{{URL::route('forum')}}">Forum</a></li>
                <li><a href="{{URL::route('forum')}}">{{ForumCategory::find($sub->forum_category_id)->name}} </a></li>
                <li><a href="{{URL::route('forum.sub', $sub->id)}}">{{ $sub->name }}</a></li>
                <li class="active">{{ $thread->title }}</li>
              </ul>
</div>

<div class=" col-md-12 pull-right forum-btns">
    <a href="#" class="btn btn-primary btn-sm pull-right">Reply</a>
    <a href="#" class="btn btn-primary btn-sm pull-right">Report Thread</a>
</div>


<table class="table table-bordered">
	<thead>
		<th class="post-top" colspan="5">
			{{Site::TimeAgo($thread->created_at)}}
		</th>
	</thead>
    
	<tbody>
	    <tr>
		   	<td class="post-user">
		    	<b><a href="{{URL::route('showUser',User::find($thread->user_id)->alias)}} ">{{ User::find($thread->user_id)->alias }}</a></b>
		    </td>
		    <td class="post-post">
		    	{{ $thread->post }}</a></b><br>
		    </td>
		</tr>
		<tr>
			<td class="post-bottom pull-right" colspan=3>
				<div class="pull-right">quote</div>
			</td>
		</tr>
		</tbody>
</table>	


@foreach($thread->posts as $post)

<table class="table table-bordered table-striped">
	<thead>
		<th class="post-top" colspan="5">
			{{ Site::TimeAgo($post->created_at)}}
		</th>
	</thead>
    
	<tbody>
	    <tr>
		   	<td class="post-user">
		    	<b><a href="{{URL::route('showUser',User::find($post->user_id)->alias)}} ">{{ User::find($post->user_id)->alias }}</a></b>
		    </td>
		    <td class="post-post">
		    	{{ $post->post }}</a></b><br>
		    </td>
		</tr>
		<tr>
			<td class="post-bottom pull-right" colspan=3>
				<div class="pull-right">quote</div>
			</td>
		</tr>
		</tbody>
</table>	
@endforeach

 {{ Form::open() }}
<div class="form-group">
	        	@foreach($errors->all('<li>:message</li>') as $error)
        		{{ $error }}
        	@endforeach

	{{ Form::textarea('post', Input::old('post'),
		array(
			'class' => 'form-control',
			'required' => 'required',
			'rows' => '4',
			'placeholder' => '',
		))
	}}

	{{ Form::submit('Submit reply',
		array(
			'class' => 'btn btn-primary btn-sm',
			'style' => 'margin-top:5px;'
		))
	}}
{{ Form::close()}}


@stop