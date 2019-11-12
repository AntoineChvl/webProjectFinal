<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginForm;
use App\Http\Requests\RegisterForm;
use GuzzleHttp\Client as HTTPClient;
use GuzzleHttp\Psr7\Request as HTTPRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use mysql_xdevapi\Result;

class LoginController extends Controller
{
    public function show()
    {
        return view('registration-connection/register');
    }

    public function login(LoginForm $request)
    {
        //$this->middleware();
        $client = new HTTPClient();
        $httpRequest = new HTTPRequest('get', 'http://' . env('ACCOUNT_SERVER_IP') . '/users',
            ['body' => 'application/json'],'{"email":"'.$request->email.'"}'
        );
        $response = json_decode($client->send($httpRequest)->getBody()->getContents());
        if(count($response->result)>0){
            if(Hash::check($request->password, $response->result[0]->password)){
                $request->session()->put('authenticated',$response->result[0]);
                if($request->session()->has('loginRedirect')){
                    $redirect = $request->session()->get('loginRedirect');
                    $request->session()->forget('loginRedirect');
                    return redirect($redirect);
                }
                return redirect('home');
            }
        }
        $errors->login[] = "La combinaison mot de passe/email est invalide";
        return view('registration-connection/register')->withErrors($errors)->withEmail($request->email);
    }

    public function logout(Request $request)
    {
        $request->session()->forget('authenticated');
        return redirect('home');
    }

    public function register(RegisterForm $request)
    {
        $client = new HTTPClient();
        $password = Hash::make($request->password);
        $httpRequest = new HTTPRequest('post', 'http://' . env('ACCOUNT_SERVER_IP') . '/users',
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
        $request->session()->put('authenticated',new User($response->result));
        if($request->session()->has('loginRedirect')){
            $redirect = $request->session()->get('loginRedirect');
            $request->session()->forget('loginRedirect');
            return redirect($redirect);
        }
        return redirect('home');
    }
}
