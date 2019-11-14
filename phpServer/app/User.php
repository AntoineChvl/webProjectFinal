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

    public function __construct($user = NULL)
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

        $response = httpRequest('get', '/users/' . $id);

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
        $response = httpRequest('get', '/users');
        $users = [];
        if ($response->status == 'success') {
            foreach ($response->result as $user) {
                $users[] = new User($user);
            }
        }
        return $users;
    }

    public static function auth()
    {
        if (session()->has('authenticated')) {
            session()->put('authenticated', static::find(session()->get('authenticated')->id));
            return session()->get('authenticated');
        }
        return NULL;
    }

    public function futureEvents()
    {
        return Event::where('user_id',$this->id)->where('date','>',now())->orderBy('date', 'desc');
    }

}
