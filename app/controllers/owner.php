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

	public function getProfile(){
		$data = array(
			'title' => Auth::user()->username,
			'id' => 'ownerProfile'
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
			$file = Input::file('banner');
			if(!empty($file)){
				$ext = Input::file('banner')->getClientOriginalExtension();
				$name = str_random(10).".".$ext;
				$upload = Input::file('banner')->move("assets/img/arena", $name);
				$img = Image::make('assets/img/arena/'.$name);
				$img->resize(null, 250, function ($constraint) {
				    $constraint->aspectRatio();
				})->save("assets/img/arena/thumb/".$name);

				if($upload){
					File::delete("assets/img/arena/".$arena->banner);
					File::delete("assets/img/arena/thumb/".$arena->banner);
					$arena->banner = $name;
				}
				else{
					return Redirect::route("add-arena-info")->with("danger", "Error occurred. Please try again.");
				}
			}
				
			$arena->name = Input::get("name");
			$arena->address = Input::get("address");
			$arena->phone = Input::get("phone");
			$arena->about = Input::get("about");
			if($arena->save()){
				return Redirect::route('add-arena-info')->with('success','updated successfully');
			}
			else{
				return Redirect::route('add-arena-info')->with('warning','Error!! Try again');
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