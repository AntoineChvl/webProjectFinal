<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterForm;
use GuzzleHttp\Client as HTTPClient;
use GuzzleHttp\Psr7\Request as HTTPRequest;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function show()
    {
        return view('registration-connection/register');
    }

    public function login(Request $request)
    {
        return view('registration-connection/register');
    }

    public function logout()
    {
        return redirect('home');
    }

    public function register(RegisterForm $request)
    {

        return view('registration-connection/register');
    }
}
