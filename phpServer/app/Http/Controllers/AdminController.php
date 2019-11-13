<?php

namespace App\Http\Controllers;

use App\Event;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Where to put admin stuff

    public function index()
    {
        $user = User::find(User::auth()->id);
        return view('admin.adminPanel', compact('user'));
    }


    public function images()
    {
        $events = Event::where('date', '<', now())->get();

        return view('admin.imagesAdministration', compact('events'));
    }


    public function eventsUsers()
    {
        $events = Event::latest()->get();
        return view('admin.usersDisplay', compact('events'));
    }


}
