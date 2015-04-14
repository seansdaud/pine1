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
		$ext = Input::file('image')->getClientOriginalExtension();
		$name = uniqid().".".$ext;
		$upload = Input::file('image')->move("assets/img/profile", $name);
		$img = Image::make('assets/img/profile/'.$name);
		$img->resize(300, null, function ($constraint) {
		    $constraint->aspectRatio();
		})->save("assets/img/profile/thumb/".$name);

		if($upload){
			$user = User::where("username", "=", Auth::user()->username)->first();
			File::delete("assets/img/profile/".$user->image);
			File::delete("assets/img/profile/thumb/".$user->image);
			$user->image = $name;
			if($user->save()){
				return Redirect::route(Input::get("profile"), Auth::user()->username)->with("success", "Profile pic changed.");
			}
			else{
				return Redirect::route(Input::get("profile"), Auth::user()->username)->with("warning", "Error occurred while updating database. Please try again.");
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

	public function postAdminPassword(){
		$user = User::where("username", "=", Auth::user()->username)->first();
		$user->password = Hash::make(Input::get("newpass"));
		$user->password_temp = "";
		if($user->save()){
			echo "true";
		}
		else{
			echo "Error occurred. Please try again.";
		}
	}

	public function getOwners(){
		$active = User::where('usertype', '=', "2")->where("active", "=", "1")->get();
		$disabled = User::where('usertype', '=', "2")->where("active", "=", "0")->get();
		$trashed = User::onlyTrashed()->where("usertype",2)->get();
		$data = array(
			'id' => 'owners',
			'title' => 'availabel owners',
			'active' => $active,
			'disabled' => $disabled,
			'trashed' => $trashed
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

	function deleteOwner(){
		$owners = Input::get("id");
		$count = 0;
		foreach($owners as $id){
			$owner = User::where("id", "=", $id);
			$user = $owner->first();
			Arena::where("user_id", $id)->delete();
			if($owner->delete()){
				$count++;
				continue;
			}
			else{
				return Redirect::route("owners")->with("danger", "Something went wrong. Please try again.");
			}
		}
		if($count == 1){
			return Redirect::route("owners")->with("success", "<a href=".URL::route('admin-owner-profile', $user->username).">".$user->username."</a> successfully deleted.");	
		}
		return Redirect::route("owners")->with("success", $count." owners successfully deleted.");
	}

	function restoreOwner(){
		$owners = Input::get("id");
		$count = 0;
		foreach($owners as $id){
			$owner = User::where("id", "=", $id);
			Arena::where("user_id", $id)->restore();
			if($owner->restore()){
				$user = $owner->first();
				$count++;
				continue;
			}
			else{
				return Redirect::route("owners")->with("danger", "Something went wrong. Please try again.");
			}
		}
		if($count == 1){
			return Redirect::route("owners")->with("success", "<a href=".URL::route('admin-owner-profile', $user->username).">".$user->username."</a> successfully restored.");	
		}
		return Redirect::route("owners")->with("success", $count." owners successfully restored.");
	}

	function disableOwner(){
		$owners = Input::get("id");
		$count = 0;
		foreach($owners as $id){
			$owner = User::where("id", "=", $id)->firstOrFail();
			$owner->active = 0;
			if($owner->save()){
				$count++;
				continue;
			}
			else{
				return Redirect::route("owners")->with("danger", "Something went wrong. Please try again.");
			}
		}
		if($count == 1){
			return Redirect::route("owners")->with("success", "<a href=".URL::route('admin-owner-profile', $owner->username).">".$owner->username."</a> successfully disabled.");	
		}
		return Redirect::route("owners")->with("success", $count." owners successfully disabled.");
	}

	function enableOwner(){
		$owners = Input::get("id");
		$count = 0;
		foreach($owners as $id){
			$owner = User::where("id", "=", $id)->firstOrFail();
			$owner->active = 1;
			if($owner->save()){
				$count++;
				continue;
			}
			else{
				return Redirect::route("owners")->with("danger", "Something went wrong. Please try again.");
			}
		}
		if($count == 1){
			return Redirect::route("owners")->with("success", "<a href=".URL::route('admin-owner-profile', $owner->username).">".$owner->username."</a> successfully enabled.");	
		}
		return Redirect::route("owners")->with("success", $count." owners successfully enabled.");
	}

	function removeOwner(){
		$owners = Input::get("id");
		$count = 0;
		foreach($owners as $id){
			if(User::where("id", "=", $id)->withTrashed()->forceDelete()){
				$count++;
				continue;
			}
			else{
				return Redirect::route("owners")->with("danger", "Something went wrong. Please try again.");
			}
		}
		if($count == 1){
			return Redirect::route("owners")->with("success", "Owner Deleted Permanently");
		}
		return Redirect::route("owners")->with("success", $count." Owner Deleted Permanently");
	}

	public function getArenas(){
		$data = array(
			'title' => 'available arenas',
			'id' => 'arenas',
			'arenas' => Arena::all()
		);

		return View::make("backend.admin.arenas", $data);
	}

	public function getAddNewArena(){
		$data = array(
			'title' => 'add new arena',
			'id' => 'arenas',
			'owners' => User::where("usertype", "=", "2")->get()
		);

		return View::make("backend.admin.arena_new", $data);
	}

	public function postAddNewArena(){
		$create = Arena::create(
			array(
				'name' => Input::get("name"),
				'address' => Input::get("address"),
				'phone' => Input::get("phone"),
				'owner_id' => Input::get("owner"),
				'about' => Input::get("about")
			)
		);

		if($create){
			return Redirect::route("admin-arenas")->with("success", "Arena Successfully Created.");
		}
		else{
			return Redirect::route("admin-arenas")->with("danger", "Something went wrong. Please try again.")->withInput();
		}
	}

	public function checkArenas(){
		$check = Input::get("check");
		$value = Input::get("value");
		if(Arena::where($check, "=", $value)->first()){
			echo "duplicate";
		}
	}

}