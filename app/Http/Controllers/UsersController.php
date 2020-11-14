<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;

class UsersController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	public function show(Request $request, $user_id)
	{

		$UserRow = User::where('id', $user_id)->firstOrFail();

		return view('user.show', ['UserRow' => $UserRow]);
	}

	public function edit($user_id)
	{
		$UserRow = Auth::user();
		return view('user.edit', ['UserRow' => $UserRow]);
	}

	public function update(Request $request)
	{
		$rules = [
			'user_name' => ['required', 'string', 'max:255'],
			'user_password' => ['required', 'string', 'min:6', 'confirmed'],
		];
		$Validation = $this->validate($request, $rules);

		$AuthUserRow = Auth::user();
		if ($request->user_profile_photo != null) {
			$request->user_profile_photo->storeAs('public/user_images', $AuthUserRow->id . '.jpg');
			$AuthUserRow->profile_photo = $AuthUserRow->id . '.jpg';
		}

		$AuthUserRow->password = bcrypt($request->user_password);

		





		dd("test");
		exit;
	}
}
