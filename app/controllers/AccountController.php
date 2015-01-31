<?php 


class AccountController extends BaseController {

	public function getLogin(){
		return View::make('frontend.login')->with('title', "Login");
	}

	public function postLogin(){
		$remember = (Input::has('remember')) ? true : false;

		$auth = Auth::attempt(
				array(
					'username' => Input::get('username'),
					'password' => Input::get('password'),
					'active' => 1
				),
				$remember
			);
		if($auth){
				if(Auth::user()->usertype == "3"){
					return Redirect::route('admin-dashboard');
				}
				elseif(Auth::user()->usertype == "2"){
					return Redirect::route('owner', Auth::user()->username);
				}
				else{
					//Redirect to intented page
					return Redirect::intended('/');
				}
			}

		return Redirect::route('login')->with('danger', "Username/Password does not mathch or account not activated.");
	}

	public function logout(){
		Auth::logout();
		return Redirect::route('home');
	}

	public function getRegister(){
		return View::make('frontend.register')->with('title', 'register');
	}

	public function postRegister(){
		$username = Input::get('username');
		$email = Input::get('email');
		$password = Input::get('password');

		$user = User::create(array(
			'username' => $username,
			'email' => $email,
			'password' => Hash::make($password),
			'active' => 0,
			'code' => str_random(60),
			'usertype' => 1,
			'name' => Input::get('name')
		));

		if($user){

			Mail::send('emails.auth.activate', 
					array(
						'link' => URL::route('activate', $user->code),
						'username' => $username,
					),
					function($message) use ($user) {
						$message->to($user->email, $user->username)
								->subject('Activate your account');
					}
				);

			return Redirect::route('home')->with('global', 'Register Complete. Please check your email for activation.');

		}
	}

	public function activate($code){
		$user = User::where('code', '=', $code)->where('active', '=', 0);

		if($user->count()){
			$user = $user->first();

			$user->code = "";
			$user->active = 1;

			if($user->save()){
				return Redirect::route('home')->with('success', 'Activation complete. You can log in now.');
			}
			else{
				return Redirect::route('home')->with('danger', 'Something went wrong. Please try again.');
			}
		}
		else{
			return Redirect::route('home')->with('warning', 'Your account is already activated or you provided the wrong activation code.');
		}
		return Redirect::route('home')->with('danger', 'Something went wrong. Please try again.');
	}

}