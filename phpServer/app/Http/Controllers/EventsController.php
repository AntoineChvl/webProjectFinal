<?php

namespace App\Http\Controllers;

use App\Event;
use App\Image;
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
        $isConnected = false;
        $userId = 0;
        $userStatus = 0;
        if(User::auth())
        {
            $isConnected = true;
            $userId = User::auth()->id;
            $userStatus = User::auth()->statusLvl;
        }
        return view('events.singleEvent', compact('event', 'isConnected','userId', 'userStatus'));
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
        $this->validateEvent();
        $image = $this->storeImage();
        Event::create(request()->only('name', 'description', 'location', 'date', 'price') + ['user_id' => User::auth()->id] + ['image_id' => $image]);

        $lastEventId = Event::latest()->first();

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
        $storedImage = $this->storeImage();
        $event->update(['image_id' => $storedImage]);
        return redirect('events');
    }

    /**
     * Remove the specified event from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        if ($event) {
            $event->delete();
        }
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
        return $imageController->publishImage(request());
    }

    public function allFormatted()
    {
        $events = Event::all();
        $eventsDetails = [];

        for($i = 0; $i < $events->count(); $i++)
        {
            $eventsDetails[$i] = array('event_name' => $events[$i]->name,'event_image' => $events[$i]->image->path,'event_description' => $events[$i]->description, 'event_location' =>  $events[$i]->location, 'event_price' => $events[$i]->price, 'event_id' => $events[$i]->id);

        }

        return Response::json(array('data' => $eventsDetails));
    }

}
