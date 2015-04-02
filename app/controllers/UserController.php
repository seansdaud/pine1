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

}