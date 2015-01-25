<?php 

class Admin extends BaseController {

	public function index(){
		return View::make("backend.admin.home")->with("title", "Dashboard");
	}

}