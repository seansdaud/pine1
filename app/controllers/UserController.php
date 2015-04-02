<?php 

class UserController extends BaseController {

	public function getProfile($username){
		$user = User::where("username", "=", $username)->firstOrFail();
		$data = array(
			'id' => 'user-profile',
			'title' => $user->username,
			'user' => $user,
		);
		return View::make("frontend.user.profile", $data);
	}

}