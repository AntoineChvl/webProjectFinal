<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StaticPagesController extends Controller
{
    public function home()
    {
        return view('home/home');
    }

    public function about()
    {
        return view('home/home');
    }
}
