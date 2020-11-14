<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Post;

class PostsController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function index()
	{
		return view('post.index');
	}

	public function new()
	{
		return view('post.new');
	}

	public function store(Request $request)
	{
		$this->validate($request, [
			'caption' => 'required|max:255',
			'photo' => 'required',
		]);
		// $validator = Validator::make($request->all(), ['caption' => 'required|max:255', 'photo' => 'required']);

		// if ($validator->fails()) {
		//     return redirect()->back()->withErrors($validator->errors())->withInput();
		// }

		$post = new Post;
		$post->caption = $request->caption;
		$post->user_id = Auth::user()->id;
		$post->save();

		$request->photo->storeAs('public/post_images', $post->id . '.jpg');
		return redirect('/');
	}
}
