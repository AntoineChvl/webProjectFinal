<?php

namespace App\Http\Controllers;

use App\Event;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Where to put admin stuff

    /* Display the admin home page */
    public function index()
    {
        $user = User::find(User::auth()->id);
        return view('admin.adminPanel', compact('user'));
    }

    /* Load images */
    public function images()
    {
        $events = Event::where('date', '<', now())->get();
        return view('admin.imagesAdministration', compact('events'));
    }

    /* Load users that participate to events */
    public function eventsUsers()
    {
        $events = Event::latest()->get();
        return view('admin.usersDisplay', compact('events'));
    }

    /* Load products */
    public function products()
    {
        return view('admin.productsDisplay');
    }

    /* Load categories */
    public function categories()
    {
        return view('admin.categoriesDisplay');
    }

    /* Load events */
    public function events()
    {
        return view('admin.eventsDisplay');
    }


}
