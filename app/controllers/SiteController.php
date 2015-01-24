<?php

class SiteController extends BaseController {

	public function index()
	{
		return View::make('frontend.home')->with("title", "Home");
	}

}
