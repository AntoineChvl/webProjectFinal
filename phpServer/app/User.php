<?php

namespace App;

use GuzzleHttp\Client as HTTPClient;
use GuzzleHttp\Psr7\Request as HTTPRequest;


class User
{
    public $id;
    public $firstname;
    public $lastname;
    public $email;
    public $campus;
    public $status;
    public $statusLvl;

    public function __constructor($user = NULL)
    {
        if ($user != NULL) {
            $this->id = $user->id;
            $this->firstname = $user->firstname;
            $this->lastname = $user->lastname;
            $this->email = $user->email;
            $this->campus = $user->campus;
            $this->status = $user->status;
            $this->statusLvl = $user->statusLvl;
        }
    }

    public static function find($id)
    {
        $client = new HTTPClient();
        $httpRequest = new HTTPRequest('get', 'http://' . env('ACCOUNT_SERVER_IP') . '/users/' . $id);
        $response = json_decode($client->send($httpRequest)->getBody()->getContents());

        if ($response->status == 'success') {
            $user = new User($response->result);
            if ($user->id != NULL) {
                return $user;
            }
        }
        return NULL;
    }

    public static function all()
    {
        $client = new HTTPClient();
        $httpRequest = new HTTPRequest('get', 'http://' . env('ACCOUNT_SERVER_IP') . '/users');
        $response = json_decode($client->send($httpRequest)->getBody()->getContents());
        $users = [];
        if ($response->status == 'success') {
            foreach($response->result as $user){
                $users[] = new User($user);
            }
        }
        return $users;
    }

    public static function auth()
    {
        if(session()->has('authenticated')){
            return session()->get('authenticated');
        }
        return NULL;
    }
}
