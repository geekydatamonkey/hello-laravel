<?php

class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$users = User::all();

		if (isset($newUser)){
			dd($newUser);
		}

		return View::make('users.index')->with('users',$users);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{

		$validation = Validator::make(Input::all(),User::$validation_rules);

		if ($validation->fails()) {
			return Redirect::route('users.create')->withErrors($validation)->withInput(Input::except('password'));
    } else {

      $user = new User();
      $user->username = Input::get('username');
      $user->password = Hash::make(Input::get('password'));
      $user->save();

      return Redirect::route('users.index')->with('newUser',$user);
    }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  string $username
	 * @return Response
	 */
	public function show($username)
	{
		$user = User::where('username',$username)->first();
		if($user) {
			return View::make('users.show')->with('user', $user);
		}
		else {
			return View::make('users.error')->with('username',$username);
		}
	}

	/**
	 * Show the form for editing the specified resource.
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
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}