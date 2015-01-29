<?php 

class Admin extends BaseController {

	public function index(){
		return View::make("backend.admin.home")->with("title", "Dashboard");
	}

	public function getOwners(){
		$user = User::where('usertype', '=', "2")->get();
		$data = array(
			'title' => 'availabel owners',
			'owners' => $user
		);
		return View::make("backend.admin.owners", $data);
	}

}