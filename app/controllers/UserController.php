<?php 

class UserController extends BaseController {

	public function getProfile($username){
		$user = User::where(array("username" => $username, "usertype" => "1"))->first();
		$event=Events::where('user_id','=', Auth::user()->id)->get();
		$booking=Booking::where('user_id','=', Auth::user()->id)->orderBy('id','desc')->get();
		
		
		if(!empty($user)):
			$data = array(
				'id' => 'user-profile',
				'title' => $user->username,
				'user' => $user,
				'booking'=>$booking
			);
		else:
			$data = array(
				'id' => 'user-profile',
				'title' => "not found",
				'user' => $user,
			);
		endif;
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
}