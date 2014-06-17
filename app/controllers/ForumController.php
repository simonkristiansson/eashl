<?php

class ForumController extends BaseController {

	public function hello(){


    	$categories = ForumCategory::all();
		return View::make('forum/forum', compact('categories'));

	}

	public function sub($subid){

		$sub = ForumSub::find($subid);
		return View::make('forum/sub', compact('sub'));
	}

	public function thread($id){

		$thread = ForumThread::find($id);
		$sub = ForumSub::find($thread->forum_sub_id);

		return View::make('forum/thread', compact('thread', 'sub'));
	}

	public function threadNew($id){

		$sub = ForumSub::find($id);
		return View::make('forum/thread-new', compact('sub'));
	}

	public function threadNewPost($id){

		print_r(Input::all());

				// What fields to validate
				$details = array(
			        'title'    => Input::get('title'),
			        'post' => Input::get('post'),
			        'sub' => $id
			    );

			    // What rules for validation
				$rules =  array(
				    'title' => 'required|min:10|unique:users,email',
				    'post' => 'required|min:10',
				    'sub' => 'required|integer',
				);

				// What messages triggers when the input doesn't match the rules

				$message = array(
					

					);

				// Run validation
			
			    $validator = Validator::make($details, $rules, $message);
				    
				// Check if the validation fails

			    if($validator->fails()){
			    	

			    	return Redirect::route('forum.thread.new', $id)->withErrors($validator);

			    } else {

			    	$thread = new ForumThread;
				    	$thread->title = Input::get('title');
				    	$thread->post = Input::get('post');
				    	$thread->user_id = Sentry::getUser()->id;
				    	$thread->forum_sub_id = $id;
				    $thread->save();
				    $lastid = $thread->id;
				    return Redirect::route('forum.thread', $lastid);
			  	}
	}

	public function postNewPost($id, $title){

		$details = array(
			'post' => Input::get('post'),
			'thread' => $id
			);

		$rules = array(
			'post' => 'required|min:5',
			'thread' => 'required|exists:forum_threads,id',
			);

		$message = array(

			);

		$validator = Validator::make($details, $rules, $message);

		if($validator->fails()){

			return Redirect::route('forum.thread', $id)->withErrors($validator);
		}else {

			$post = new ForumPost;
				$post->post = Input::get('post');
				$post->forum_thread_id = $id;
				$post->user_id = Sentry::getUser()->id;
			$post->save();

			return Redirect::route('forum.thread', $id);
		}
	}
}

