<?php

namespace App\Http\Controllers;

use App\Event;
use App\Images;
use App\Participate;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class EventsController extends Controller
{
    /**
     * Display a listing of all events.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::with('image')->latest()->whereDate('date', '>=', now())->limit(3)->get();
        $past_events = Event::whereDate('date', '<', now())->limit(3)->get();
        $eventsGroup = ['du mois', 'passés'];
        return view('events.eventsIndex', compact('events', 'past_events', 'eventsGroup'));

    }

    /**
     * Display the specified event.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        $isParticipated = false;
        $isConnected = false;
        $userId = 0;
        if(User::auth())
        {
            $isConnected = true;
            $userId = User::auth()->id;
        }
        return view('events.singleEvent', compact('event', 'isConnected','userId'));
    }

    /**
     * Show the form for creating a new event.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('events.createEvent');
    }

    /**
     * Store a newly created event in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        Event::create($this->validateEvent());
        $this->storeImage();

        $lastEventId = Event::latest()->first();

        /*The user id is still not being considered. It will be changed later.*/

        return redirect(route('events.show', $lastEventId));

    }



    /**
     * Show the form for editing the specified event.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        $this->storeImage();
        return view('events.editEvent', compact('event'));
    }

    /**
     * Update the specified event in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Event $event)
    {
        $event->update($this->validateEvent());
        $this->storeImage();
        return redirect('events');
    }

    /**
     * Remove the specified event from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }

    public function validateEvent()
    {
        return request()->validate([
            'name' => 'required|min:3|string',
            'description' => 'required|min:10',
            'location' => 'required|min:3',
            'date' => 'required|date|after:today',
            'price' => 'nullable|integer|max:15',
            'image' => 'required',
        ]);
    }

    public function storeImage()
    {
        $imageController = new ImagesController();
        $imageController->publishImage(request());
    }

    public function users()
    {
        $eventId = request()->input('event_id');
        $users_id = Participate::where('event_id', '=', $eventId)->get();
        $users = [];

        for($i = 0; $i < $users_id->count(); $i++)
        {
            $users[$i] = array('event_id' => Event::find($eventId)->first()->id,'event_name' => Event::find($eventId)->first()->name,'user_id' => $users_id[$i]->user_id, 'user_first_name' => User::find($users_id[$i]->user_id)->firstname, 'user_last_name' => User::find($users_id[$i]->user_id)->lastname);
        }

        return Response::json(array('data' => $users));

    }
}
