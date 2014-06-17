@extends('layouts/forum')

@section('leftcontent')



<div class="page-header">
<ul class="breadcrumb" style="margin-bottom: 5px;">
                <li><a href="{{URL::route('forum')}}">Forum</a></li>
                <li><a href="{{URL::route('forum')}}">{{ForumCategory::find($sub->forum_category_id)->name}} </a></li>
                <li><a href="{{URL::route('forum.sub', $sub->id)}}">{{ $sub->name }}</a></li>
                <li class="active">New Thread</li>
              </ul>
</div>
{{ Form::open() }}
<div class="form-group">
	        	@foreach($errors->all('<li>:message</li>') as $error)
        		{{ $error }}
        	@endforeach

{{ Form::text('title', Input::old('title'),
		array(
			'class' => 'input form-control',
			'placeholder' => 'Thread title',
			'required' => 'required',
		))
	}}


	{{ Form::textarea('post', Input::old('post'),
		array(
			'class' => 'form-control',
			'required' => 'required',
			'placeholder' => '',
		))
	}}

	{{ Form::submit('Submit thread',
		array(
			'class' => 'btn btn-primary',
			'style' => 'margin-top:5px;'
		))
	}}
{{ Form::close()}}
</div>
@stop