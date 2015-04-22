<?php 

class UserController extends BaseController {

	public function getProfile($username){
		$user = User::where(array("username" => $username, "usertype" => "1"))->first();
		if(empty($user)){
			App::abort(404);
		}
		$token=Token::where("user_id",$user->id)->get();
		$data = array(
			'id' => 'user-profile',
			'title' => $user->username,
			'user' => $user,
			'token'=>$token
		);
		return View::make("frontend.user.profile", $data);
	}

	function addReview(){
		$data = array(
			'user_id' => Auth::user()->id,
			'review' => Input::get("review"),
			"arena_id" => Input::get("arena_id")
		);
		if(Review::Create($data)){
			return Redirect::route("arena-detail", Input::get("arena_id"))->with("success", "Review Successfully Added.");
		}
		return Redirect::route("arena-detail", Input::get("arena_id"))->with("danger", "Error Occurred.");
	}

	public function changeProfile(){
		$data=array(
			'id'=>'change-profile',
			'title'=>'change-profile'
			);
		return View::make("frontend.user.update_profile", $data);
	}

	public function profileUpdated(){
		if(Input::hasfile('image')){
				$file = Input::file('image');
				$ext = Input::file('image')->getClientOriginalExtension();
				$name = uniqid().".".$ext;
				$upload = Input::file('image')->move("assets/img/profile/user/", $name);
				$img = Image::make('assets/img/profile/user/'.$name);
				$img->resize(300, null, function ($constraint) {
				    $constraint->aspectRatio();
				})->save("assets/img/profile/user/thumb/".$name);

				if($upload){
					$user = User::where("id", "=", Auth::user()->id)->first();
					File::delete("assets/img/profile/user/".$user->image);
					File::delete("assets/img/profile/user/thumb/".$user->image);
					$user->image = $name;
					$user->name = Input::get("name");
					$user->email = Input::get("email");
					$user->contact = Input::get("contact");
					$user->address = Input::get("address");
					$user->users_daily = Input::get("users_daily");
					if($user->save()){
						return Redirect::route('user-profile',Auth::user()->username)
							->with('success','updated successfully');
					}
					else{
						return Redirect::route('user-profile',Auth::user()->username)
							->with('warning','Error!! Try again');
					}
				}

				else{
					return Redirect::route("user-profile", Auth::user()->username)->with("danger", "Error uploading your file. Please try again.");
				}
			}
		else{
			$user = User::where("id", "=", Auth::user()->id)->first();
			$user->name = Input::get("name");
			$user->email = Input::get("email");
			$user->contact = Input::get("contact");
			$user->address = Input::get("address");
			$user->users_daily = Input::get("users_daily");
			if($user->save()){
				return Redirect::route('user-profile',Auth::user()->username)
			->with('success','updated successfully');
			}
			else{
				return Redirect::route('user-profile',Auth::user()->username)
			->with('warning','Error!! Try again');
			}
		}
	}

	function changeCover(){
				$file = Input::file('cover');
				$ext = Input::file('cover')->getClientOriginalExtension();
				$name = uniqid().".".$ext;
				if(!is_dir("assets/img/profile/user/cover")){
						mkdir("assets/img/profile/user/cover",0777, true);
					}
				$upload = Input::file('cover')->move("assets/img/profile/user/cover", $name);
				if($upload){
					$user = User::where("id", "=", Auth::user()->id)->first();
					File::delete("assets/img/profile/user/cover/".$user->cover_pic);
					$user->cover_pic = $name;
					if($user->save()){
						return Redirect::route('user-profile',Auth::user()->username)
							->with('success','updated successfully');
					}
					else{
						return Redirect::route('user-profile',Auth::user()->username)
							->with('warning','Error!! Try again');
					}
				}

				else{
					return Redirect::route("user-profile", Auth::user()->username)->with("danger", "Error uploading your file. Please try again.");
				}
	}

	function updateEvent(){
		$event_id=Input::get('event_id');
		if(Input::hasfile('image')){
				$file = Input::file('image');
				$ext = Input::file('image')->getClientOriginalExtension();
				$name = uniqid().".".$ext;
				$upload = Input::file('image')->move("assets/img/", $name);

				if($upload){
					$event = Events::where("id", "=", $event_id)->first();
					File::delete("assets/img/".$event->image);
					$event->image = $name;
					$event->name = Input::get("name");
					$event->detail = Input::get("detail");
					if($event->save()){
						return Redirect::route('user-profile',Auth::user()->username)
							->with('success','updated successfully');
					}
					else{
						return Redirect::route('user-profile',Auth::user()->username)
							->with('warning','Error!! Try again');
					}
				}

				else{
					return Redirect::route("user-profile", Auth::user()->username)->with("danger", "Error uploading your file. Please try again.");
				}
			}
		else{
			$event = Events::where("id", "=", $event_id)->first();
			$event->name = Input::get("name");
			$event->detail = Input::get("detail");
			if($event->save()){
				return Redirect::route('user-profile',Auth::user()->username)
			->with('success','updated successfully');
			}
			else{
				return Redirect::route('user-profile',Auth::user()->username)
			->with('warning','Error!! Try again');
			}
		}
	}
}