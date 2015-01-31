<?php 

class Admin extends BaseController {

	public function index(){
		return View::make("backend.admin.home")->with("title", "Dashboard");
	}

	public function profile(){
		return View::make("backend.admin.profile")->with("title", Auth::user()->username);
	}

	public function getOwners(){
		$user = User::where('usertype', '=', "2")->get();
		$data = array(
			'title' => 'availabel owners',
			'owners' => $user
		);
		return View::make("backend.admin.owners", $data);
	}

	public function postProfilePic(){
		$file = Input::file('image');
		$ext = $extension = Input::file('image')->getClientOriginalExtension();
		$name = uniqid();
		$upload = Input::file('image')->move("assets/img/profile", $name.'.'.$ext);
		$img = Image::make('assets/img/profile/'.$name.".".$ext);
		$img->resize(300, null, function ($constraint) {
		    $constraint->aspectRatio();
		})->save("assets/img/profile/".$name."_thumb.".$ext);

		if($upload){
			$user = User::where("username", "=", Auth::user()->username)->first();
			File::delete("assets/img/profile/".$user->image);
			$ext1 = last(explode(".", $user->image));
			File::delete("assets/img/profile/".head(explode(".", $user->image))."_thumb".".".$ext1);
			$user->image = $name.".".$ext;
			if($user->save()){
				return Redirect::route("admin-profile", Auth::user()->username)->with("success", "Profile pic changed.");
			}
			else{
				return Redirect::route("admin-profile", Auth::user()->username)->with("warning", "Error occurred while updating database. Please try again.");
			}
		}

		else{
			return Redirect::route("admin-profile", Auth::user()->username)->with("danger", "Error uploading your file. Please try again.");
		}
	}

	public function postAdminUsername() {
		$username = User::where("username", "=", Input::get("value"));
		if($username->count()){
			$username = $username->first();
			if($username->id == Auth::user()->id){
				echo "Username Same";
			}
			else{
				echo "Username not available";
			}
		}
		else{
			$user = User::where("username", "=", Auth::user()->username)->first();
			$user->username = Input::get("value");
			if($user->save()){
				echo "true";
			}
			else{
				echo "Error Occurred. Please try again.";
			}
		}
	}

	public function postAdminEmail(){
		$user = User::where("email", "=", Input::get("value"));
		if($user->count()){
			$user = $user->first();
			if($user->id == Auth::user()->id){
				echo "We cannot update the same old email.";
			}
			else{
				echo "Email already register to ".$user->username;
			}
		}
		else{
			$user = User::where("username", "=", Auth::user()->username)->first();
			$user->email = Input::get("value");
			if($user->save()){
				echo "true";
			}
			else{
				echo "Error Occurred. Please try again.";
			}
		}
	}

	public function postAdminName(){
		$user = User::where("username", "=", Auth::user()->username)->first();
		$user->name = Input::get("value");
		if($user->save()){
			echo "true";
		}
		else{
			echo "Error occurred. Please try again.";
		}
	}

}