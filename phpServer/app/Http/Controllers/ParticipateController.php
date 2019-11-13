<?php

namespace App\Http\Controllers;

use App\Participate;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

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


    public function getUsers()
    {
        $users = Participate::where('event_id', '=', 2)->get();
        $userDetails = [];

        $testUser = User::find(19);

        // work in progress...

        return Response::json($users);
    }





}
