<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Where to put admin stuff

    public function index()
    {

        $pastEventsNumber = Event::where('date', '<', now())->count();
        $events = Event::where('date', '<', now())->get();
        return view('admin.adminPanel', compact('pastEventsNumber', 'events'));

    }


    public function images()
    {
        $events = Event::where('date', '<', now())->get();

        return view('admin.adminImages', compact('events'));
    }


}
