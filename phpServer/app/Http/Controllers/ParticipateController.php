<?php

namespace App\Http\Controllers;

use App\Participate;
use App\User;
use Illuminate\Http\Request;

class ParticipateController extends Controller
{

    public function participate(Request $request)
    {
        if(User::auth())
        {
            $participation = array('event_id' => $request->input('event_id'), 'user_id' => User::auth()->id);
            Participate::create($participation);
        }
    }


    public function noLongerParticipate(Request $request)
    {
        if(User::auth())
        {
            $participationToRemove = Participate::where('event_id', '=', $request->input('event_id'))->where('user_id', '=', User::auth()->id);
            $participationToRemove->delete();
        }
    }





}
