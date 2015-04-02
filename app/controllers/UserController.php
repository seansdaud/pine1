<?php 

class UserController extends BaseController {

	public function getProfile($username){
		$user = User::where(array("username" => $username, "usertype" => "1"))->first();
		if(!empty($user)):
			$data = array(
				'id' => 'user-profile',
				'title' => $user->username,
				'user' => $user,
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

}