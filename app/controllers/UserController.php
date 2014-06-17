<?php

class UserController extends BaseController {

	public function home(){

		return View::make('hello.php');
	}

	public function login() {

		$message = Session::get('message');
		return View::make('user/login', compact('message'));
	}

	public function logout() {

		Sentry::logout();
		return Redirect::route('home');
	}

	public function register() {

		return View::make('user/register');
	}

	public function loginPost(){


		    $credentials = array(
                'email'    => Input::get('email'),
            	'password' => Input::get('password'),
            );
    
            try
            {

				$user = Sentry::authenticate($credentials, false);

                if ($user)
                {   
                    return Redirect::route('home');
                }
            }

            // Errors
		    catch (Cartalyst\Sentry\Users\WrongPasswordException $e)
		    {
		        return Redirect::route('login')
		            ->with('message','The combination of email and password does not match');
		    }    
            catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
		    {
		        return Redirect::route('login')
		            ->with('message','You must enter an email');
		    }
		    catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
		    {
		        return Redirect::route('login')
		            ->with('message','You must enter a password');
		    }
		    catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
		    {	        
		        return Redirect::route('login')
		            ->with('message','User is not activated, see activation mail in the mailbox');
		    }   
		    catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		    {
		        return Redirect::route('login')
		            ->with('message','The combination of email and password does not match');
		    }
	}

	public function registerPost() {

				// What fields to validate

				Input::flash();
				$details = array(
			        'email'    => Input::get('email'),
			        'password' => Input::get('password'),
			        'password_confirmation' => Input::get('password_confirmation'),
			        'alias' => Input::get('alias'),
			        'first_name' => Input::get('first_name'),
			        'last_name' => Input::get('last_name'),
			    );

			    // What rules for validation

				$rules =  array(
				        'email' => 'required|email|unique:users,email',
				        'password' => 'required|confirmed|min:6',
				        'alias' => 'required|min:2|max:32|unique:users,alias',
				        'first_name' => 'required|alpha',
				        'last_name' => 'required|alpha',
				);

				// What messages triggers when the input doesn't match the rules

				$message = array(
					'email.email' => 'Your email address is not valid',
					);

				$detailsRegister = array(
			        'email'    => Input::get('email'),
			        'password' => Input::get('password'),
			        'alias' => Input::get('alias'),
			        'first_name' => Input::get('first_name'),
			        'last_name' => Input::get('last_name'),

			    );

				// Run validation
			
			    $validator = Validator::make($details, $rules, $message);
				    
				// Check if the validation fails

			    if($validator->fails()){
			    	

			    	return Redirect::route('register')->withErrors($validator);

			    } else {

			    	// Register the user

			    	$user = Sentry::register($detailsRegister);

			    	// Get the activation code

			    	$activationCode = $user->getActivationCode();

			    	// Activate the user

			    	$user->attemptActivation($activationCode);

			    	// Login the user and redirect to computer

			    	Sentry::login($user, false);
			    	
			    	return Redirect::route('home');
			    	


			    	
			    }
	}

	public function showUser($alias){

		return View::make('user/profile');
	}




}