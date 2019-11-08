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
        $client = new HTTPClient();
        $password = bcrypt($request->password);
        $httpRequest = new HTTPRequest('post', 'http://127.0.0.1:8080/users',
            ['body' => 'application/json'],'
            {
                "firstname":"'.$request->firstName.'",
                "lastname":"'.$request->lastName.'",
                "email":"'.$request->email.'",
                "password":"'.$password.'",
                "campus":"'.$request->campus.'"
            }'
        );
        $response = json_decode($client->send($httpRequest)->getBody()->getContents());
        dd($response);
        return view('registration-connection/register');
    }
}
