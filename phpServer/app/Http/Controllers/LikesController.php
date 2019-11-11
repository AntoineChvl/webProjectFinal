<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;

class LikesController extends Controller
{

    public function addLike(Request $request)
    {
        $likeData = array('images_past_events_id' => $request->input('images_past_events_id'), 'user_id' => $request->input('user_id'));
        Like::create($likeData);
    }

    public function removeLike(Request $request)
    {
        $likeToRemove = Like::where('images_past_events_id', '=', $request->input('images_past_events_id'))->where('user_id', '=', $request->input('user_id'));
        $likeToRemove->delete();
    }
}
