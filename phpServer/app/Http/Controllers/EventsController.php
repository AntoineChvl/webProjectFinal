<?php

namespace App\Http\Controllers;

use App\Event;
use App\Image;
use App\Mail\NotificationMembers;
use App\Participate;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;
use stdClass;

class EventsController extends Controller
{
    /**
     * Display a listing of all events.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::with('image')->orderBy('date', "ASC")->whereDate('date', '>=', now())->limit(3)->get();
        $past_events = Event::orderBy('date', 'ASC')->whereDate('date', '<', now())->limit(3)->get();

        return view('events.eventsIndex', compact('events', 'past_events'));

    }

    public function moreEvents(Request $request)
    {
        $skip = $request->input('skip');
        $events = [];
        $response = [];

        if($request->input('typeOfEvents') == 2)
        {
            $events = Event::orderBy('date', "ASC")->whereDate('date', '>=', now())->skip($skip)->take(3)->get();

        } elseif($request->input('typeOfEvents') == 3) {

            $events = Event::orderBy('date', 'ASC')->whereDate('date', '<', now())->skip($skip)->take(3)->get();

        }

        foreach ($events as $event) {
            $ev = new stdClass;
            $ev->id = $event->id;
            $ev->name = $event->name;
            $ev->image_path = $event->image->path;
            $ev->show_path = route('events.show', $event);
            $response[] = $ev;
        }

        return Response::json($response);
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
        $event->update($this->validateEditingEvent());
        $storedImage = $this->storeImage();
        if($storedImage){
            $event->update(['image_id' => $storedImage]);
        }

        return redirect(route('admin-panel'));
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
            'price' => 'nullable|integer|max:500',
            'image' => 'required',
        ]);
    }


    public function validateEditingEvent()
    {
        return request()->validate([
            'name' => 'required|min:3|string',
            'description' => 'required|min:10',
            'location' => 'required|min:3',
            'date' => 'required|date|after:today',
            'price' => 'nullable|integer|max:500'
        ]);
    }

    public function storeImage()
    {
        $imageController = new ImagesController();
        return $imageController->publishImage(request());
    }

    public function allFormatted()
    {
        $events = Event::where('is_validated', '=', 1)->get();
        $eventsDetails = [];

        for($i = 0; $i < $events->count(); $i++)
        {
            $eventsDetails[$i] = array('event_name' => $events[$i]->name,'event_image' => $events[$i]->image->path,'event_description' => substr($events[$i]->description, 0, 100).'...', 'event_location' =>  $events[$i]->location, 'event_price' => $events[$i]->price, 'event_id' => $events[$i]->id);

        }

        return Response::json(array('data' => $eventsDetails));
    }


    public function updateEvent(Request $request)
    {
        if(User::auth())
        {
            $eventChecked = Event::where('id', '=', $request->input('data'))->first();
            $eventChecked->validate();
            $eventData = array('type' => 'EVENT', 'content' => $eventChecked->name, 'user' => User::find($eventChecked->user_id)->lastname.' '.User::find($eventChecked->user_id)->firstname);

            if(User::auth()->statusLvl == 3)
            {
                Mail::to(User::auth()->email)->send(new NotificationMembers($eventData));
            }

            return Response::json($eventData);
        }
    }

}
