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

}