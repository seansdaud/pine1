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
		$arena=Arena::where("user_id", "=", Auth::user()->id)->get();
		if(!($arena->isEmpty())){
				$data = array(
				'title' => 'add-arena-info',
				'id' => 'add-arena-info',
				'info'=>$arena[0]
			);
		}
		else{
				$create = Arena::create(
				array(
					'name' => Auth::user()->name,
					'address' =>'',
					'phone' => '',
					'about' => '',
					'user_id' => Auth::user()->id
				)
			);
			return Redirect::route("add-arena-info");
		}
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
				$arena = Arena::where("user_id", "=", Auth::user()->id)->first();
				$arena->name = Input::get("name");
				$arena->address = Input::get("address");
				$arena->phone = Input::get("phone");
				$arena->about = Input::get("about");
				if($arena->save()){
					return Redirect::route('add-arena-info')
				->with('success','updated successfully');
				}
				else{
					return Redirect::route('add-arena-info')
				->with('warning','Error!! Try again');
				}
			}
	}
	public function uploadImage(){
		$data = array(
				'title' => 'img',
				'id' => 'img'
			);
		return View::make("backend.owners.upload_image",$data);
	}

	public function imageUploaded(){
		$file = Input::file('image');
		$ext = $file->getClientOriginalExtension();
		$name = uniqid().".".$ext;
		$upload = $file->move("assets/img/arena", $name);
		$img = Image::make('assets/img/arena/'.$name);
		$img->resize(300, null, function ($constraint) {
		    $constraint->aspectRatio();
		})->save("assets/img/arena/".$name);

		if($upload){
				return Redirect::route("upload-image")->with("success","updated");
		}

		else{
			return Redirect::route("upload-image")->with("warning","updated");
		}
	}

}