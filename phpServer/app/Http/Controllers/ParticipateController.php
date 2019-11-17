<?php

namespace App\Http\Controllers;

use App\Event;
use App\Participate;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class ParticipateController extends Controller
{
    /* Add a participation in our database table */
    public function participate(Request $request)
    {
        if(User::auth())
        {
            $participation = array('event_id' => $request->input('event_id'), 'user_id' => User::auth()->id);
            Participate::create($participation);
        }
    }

    /* Remove a participation in our database table */
    public function noLongerParticipate(Request $request)
    {
        if(User::auth())
        {
            $participationToRemove = Participate::where('event_id', '=', $request->input('event_id'))->where('user_id', '=', User::auth()->id);
            $participationToRemove->delete();
        }
    }

    /* Get users that participate to an event, for datatable purpose */
    public function users()
    {
        $eventId = request()->input('event_id');
        $users_id = Participate::where('event_id', '=', $eventId)->get();
        $users = [];

        for($i = 0; $i < $users_id->count(); $i++)
        {
            $users[$i] = array('event_id' => Event::find($eventId)->id,'event_name' => Event::find($eventId)->name,'user_id' => $users_id[$i]->user_id, 'user_first_name' => User::find($users_id[$i]->user_id)->firstname, 'user_last_name' => User::find($users_id[$i]->user_id)->lastname);
        }

        return Response::json(array('data' => $users));
    }



}
