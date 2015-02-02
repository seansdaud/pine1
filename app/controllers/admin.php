<?php 

class Admin extends BaseController {

	public function index(){
		$data = array(
			'id' => 'dashboard',
			'title' => 'dashboard',
			'owners' => User::where("usertype", "=", "2")->get()
		);
		return View::make("backend.admin.home", $data);
	}

	public function profile(){
		$data = array(
			'id' => 'admin-profile',
			'title' => Auth::user()->username
		);
		return View::make("backend.admin.profile", $data);
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

	public function getOwners(){
		$user = User::where('usertype', '=', "2")->get();
		$data = array(
			'id' => 'owners',
			'title' => 'availabel owners',
			'owners' => $user
		);
		return View::make("backend.admin.owners", $data);
	}

	public function getNewOwner(){
		$data = array(
			'id' => 'owners',
			'title' => 'create new owner',
		);
		return View::make("backend.admin.create_new_owner", $data);
	}

	public function checkOwners(){
		$check = Input::get("check");
		$value = Input::get("value");
		if(User::where($check, "=", $value)->first()){
			echo "duplicate";
		}
	}

	public function postNewOwner(){
		$password = str_random(10);
		$create = User::create(
			array(
				'name' => Input::get("name"),
				'username' => Input::get("username"),
				'email' => Input::get("email"),
				'password' => Hash::make($password),
				'password_temp' => $password,
				'active' => 1,
				'usertype' => 2
			)
		);

		if($create){
			return Redirect::route("create-new-owner")->with("success", "Owner <a href=".URL::route('admin-owner-profile', Input::get("username")).">".Input::get("username")."</a> successfully created.");
		}
		else{
			return Redirect::route("create-new-owner")->with("danger", "Something went wrong. Please try again.")->withInput();
		}
	}

	public function getOwnerProfile($username){
		$owner = User::where("username", "=", $username)->firstOrFail();
		$data = array(
			'id' => 'owners',
			'title' => $owner->username,
			'owner' => $owner
		);
		return View::make("backend.admin.owner_profile", $data);
	}

}