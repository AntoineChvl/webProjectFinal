<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
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

    public function contact() {
        return view('infos/contact');
    }

    public function legalMention() {
        return view('infos/legal_mention');
    }

    public function propos() {
        return view('infos/propos');
    }

    public function privacyPoliticy() {
        return view('infos/privacy_politicy');
    }

    public function cgv() {
        return view('infos/cgv');
    }

    public function showUser() {
        return view('registration-connection/member_space')->withUser(User::auth());
    }
}
