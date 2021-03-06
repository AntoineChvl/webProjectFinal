<?php

namespace App\Http\Controllers;

use App\Like;
use App\User;
use Illuminate\Http\Request;

class LikesController extends Controller
{
    /* Add a like in our database table */
    public function add(Request $request)
    {
        if(User::auth())
        {
            $likeData = array('images_past_events_id' => $request->input('images_past_events_id'), 'user_id' => User::auth()->id);
            Like::create($likeData);
        }
    }

    /* Remove a like in our database table */
    public function remove(Request $request)
    {
        if(User::auth())
        {
            $likeToRemove = Like::where('images_past_events_id', '=', $request->input('images_past_events_id'))->where('user_id', '=', User::auth()->id);
            $likeToRemove->delete();
        }
    }
}
