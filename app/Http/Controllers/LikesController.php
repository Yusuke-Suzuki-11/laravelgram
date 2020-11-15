<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $LikeRow = new Like;
        $LikeRow->post_id = $request->post_id;
        $LikeRow->user_id = Auth::user()->id;
        $LikeRow->save();

        return redirect('/');
    }

    public function delete(Request $request)
    {
        $LikeRow = Like::where('user_id', Auth::user()->id)->find($request->like_id);
        $LikeRow->delete();
        return redirect('/');
    }
}
