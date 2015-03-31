<?php

class Owner extends BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /owner
	 *
	 * @return Response
	 */
	public function index()
	{
		$data = array(
			'title' => 'dashboard',
			'id' => 'dashboard'
		);
		return View::make("backend.owners.home", $data);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /owner/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /owner
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /owner/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /owner/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /owner/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /owner/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

	public function getProfile($owner){
		$user = User::where("username", "=", $owner)->first();
		$data = array(
			'title' => $user->username,
			'id' => 'ownerProfile',
			'owner' => $user
		);

		return View::make("backend.owners.profile", $data);
	}

	public function addArena(){
		$data = array(
			'title' => 'add-arena-info',
			'id' => 'add-arena-info',
			'info' => Arena::where("user_id", "=", Auth::user()->id)->get()
		);
		return View::make("backend.owners.add_arena",$data);
	}
	public function addingArena(){
		$validator=Validator::make(Input::all(),
			array(
				'name'=>'required',
				'address'=>'required',
				'phone'=>'required'
				)
			);
		if($validator->fails()){
			return Redirect::route('add-arena-info')
				->withErrors($validator);
		}
		else{
				$name=Input::get('name');
				$address=Input::get('address');
				$phone=Input::get('phone');
				$user= Auth::user()->id;
				$about=Input::get('about');
				$create=Arena::create(array(
						'name'=>$name,
						'address'=>$address,
						'phone'=>$phone,
						'about'=>$about,
						'user_id'=>$user
					));
				if($create){
					return Redirect::route('add-arena-info')
						->with('global','arena-added');
				}
			}
	}

	public function editArena($arena){
		$data = array(
			'title' => 'edit-arena-info',
			'id' => 'edit-arena-info',
			'info' => Arena::where("id", "=", $arena)->firstOrFail()
		);
		return View::make("backend.owners.edit_arena", $data);
	}

	public function arenaInfoEdited(){
		$validator=Validator::make(Input::all(),
			array(
				'name'=>'required',
				'address'=>'required',
				'phone'=>'required'
				)
			);
		if($validator->fails()){
			return Redirect::route('edit-arena-info',Input::get('arena_id'))
				->withErrors($validator);
		}
		else{
				$arena = Arena::where("id", "=", Input::get('arena_id'))->first();
				$arena->name = Input::get("name");
				$arena->address = Input::get("address");
				$arena->phone = Input::get("phone");
				$arena->about = Input::get("about");
				if($arena->save()){
					return Redirect::route('add-arena-info')
				->with('success','edited successfully');
				}
				else{
					return Redirect::route('edit-arena-info',Input::get('arena_id'))
				->with('warning','Error!! Try again');
				}
			}
	}
		public function markerUpdate(){

			$adminid = Auth::id();
			$data = array(
			'title' => 'Update Maps',
			'id' => 'maps',
			'info' =>Marker::where("admin_id", $adminid)->get()
		);
		return View::make("backend.owners.updatemarker",$data)->with("title", "Edit Maps");

	}
	public function createMaps(){
			$adminid = Auth::id();
		$get=Marker::where("admin_id", "=", $adminid)->get();
		if ($get->isEmpty()) {
			$mark= new Marker;
			$mark->lat=Input::get("lat");
			$mark->lng=Input::get("lng");
			$mark->map=Input::get("iframe");
			$mark->admin_id=$adminid;
			if($mark->save()){
					return Redirect::route('marker-update')->with('warning','Updated Map');
				}
		}
		else{
				$data = array(
			'lat'=>Input::get("lat"),
			'lng'=>Input::get("lng"),
			'map'=>Input::get("iframe")
					);
						Marker::where('admin_id', Auth::id())->update($data);
		}
		return Redirect::route('marker-update')->with('warning','Updated Map');
	}

}