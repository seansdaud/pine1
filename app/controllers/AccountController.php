<?php 


class AccountController extends BaseController {

	public function postLogin(){
		$remember = (Input::has('remember')) ? true : false;

		$auth = Auth::attempt(
				array(
					'username' => Input::get('username'),
					'password' => Input::get('password')
				),
				$remember
			);
		if($auth){
				if(Auth::user()->usertype == "3"){
					echo route('admin-dashboard');
				}
				elseif(Auth::user()->usertype == "2"){
					echo route('owner-dashboard');
				}
				else{
					//Redirect to intented page
					echo Redirect::intended("/")->getTargetUrl();
				}
			}
		else{
			echo "Invalid";
		}
	}

	public function forgot(){
		$user = User::where("email", "=", Input::get("email"));
		if($user->count()){
			$user = $user->first();

			$code = str_random(60);
			$password = str_random(10);

			$user->code = $code;
			$user->password_temp = Hash::make($password);

			if($user->save()){
				if(Mail::send('emails.auth.reminder',
					array(
						'link' => URL::route('recover', $code),
						'username' => $user->username,
						'password' => $password
					),
					function($message) use ($user) {
						$message->to($user->email, $user->username)
								->subject("New password for your account");
					}
				)){
					echo "Success";
					exit();
				}
			}
		}
		else{
			echo "Empty";
			exit();
		}
	}

	public function recover($code){
		$user = User::where("code", "=", $code)->where("password_temp", "!=", "");

		if($user->count()) {
			$user = $user->first();

			$user->password = $user->password_temp;
			$user->password_temp = "";
			$user->code = "";

			if($user->save()){
				return Redirect::route("home")->with("success", "Please login using your new password.");
			}
		}

		return Redirect::route("home")->with("danger", "Could not recover your account. Please try again.");
	}

	public function logout(){
		Auth::logout();
		return Redirect::route('home');
	}

	public function getRegister(){
		$data = array(
			'id' => 'register',
			'title' => 'register'
		);
		return View::make('frontend.register', $data);
	}

	function checkUsers(){
		$check = Input::get("check");
		$value = Input::get("value");
		if(User::where($check, "=", $value)->first()){
			echo "duplicate";
		}
	}


	public function postRegister(){

		$username = Input::get('username');
		$email = Input::get('email');
		$password = Input::get('password');
		$data=User::where('name',Input::get('name'))->where('contact',Input::get('contact'))->where('usertype',4)->first();
		if ($data) {
			$validator = Validator::make(Input::all(),
				array(
					'username' => 'required|unique:users',
					'email' => 'required|email|unique:users',
				)
			);

			if($validator->fails()){
				return Redirect::route('register')
						->withErrors($validator)
						->withInput();
			}
			$data1 = array(
				'username' => $username,
				'email' => $email,
				'password' => Hash::make($password),
				'active' => 0,
				'code' => str_random(60),
				'usertype' => 1,
				'name' => Input::get('name'),
				'address'=> Input::get('address'),
				'contact'=> Input::get('contact'),
			);
		
			User::where('id', $data->id)->update($data1);
			$user=User::where('id', $data->id)->first();
					
		}
		else{
			$validator = Validator::make(Input::all(),
				array(
					'username' => 'required|unique:users',
					'email' => 'required|email|unique:users',
					'contact' => 'required|unique:users'
				)
			);

			if($validator->fails()){
				return Redirect::route('register')
						->withErrors($validator)
						->withInput();
			}

			$user = User::create(array(
				'username' => $username,
				'email' => $email,
				'password' => Hash::make($password),
				'active' => 0,
				'code' => str_random(60),
				'usertype' => 1,
				'name' => Input::get('name'),
				'address'=> Input::get('address'),
				'contact'=> Input::get('contact'),
			));
		}
	

		if($user){
			$player_id=DB::getPdo()->lastInsertId();
			$token=Token::create(array(
				'user_id'=>$player_id,
				'booking_points'=>null
				));
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

			$creadentials = array(
				'username' => $username,
				'password' => $password
			);

			if(Auth::attempt($creadentials)){
				return Redirect::route('home')->with('success', 'Register Complete. Please check your email for activation.');
			}
			else{
				return Redirect::route('home')->with("danger", "Something went wrong. Please try again.");
			}

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

	public function resendEmail(){
		Mail::send('emails.auth.activate', 
					array(
						'link' => URL::route('activate', Auth::user()->code),
						'username' => Auth::user()->username,
					),
					function($message) {
						$message->to(Auth::user()->email, Auth::user()->name)
								->subject('Activate your account');
					}
				);

		if(count(Mail::failures()) > 0){
			return Redirect::route("home")->with("warning", "Something went wrong. Please try again.");
		}
		return Redirect::route("home")->with("success", "Please check your email for activation.");
	}

}