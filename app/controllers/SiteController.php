<?php

class SiteController extends BaseController {

	public function index()
	{
		$data = array(
			'id' => 'home',
			'title' => 'home'
		);
		return View::make('frontend.home', $data);
	}

	function arenas(){
		$data = array(
			'id' => 'arenas',
			'title' => 'arenas'
		);
		return View::make("frontend.arenas.arenas", $data);
	}

	function about(){
		$data = array(
			'id' => 'about',
			'title' => 'about'
		);
		return View::make("frontend.about", $data);
	}

	function contact(){
		$data = array(
			'id' => 'contact',
			'title' => 'contact'
		);
		return View::make("frontend.contact", $data);
	}

}
