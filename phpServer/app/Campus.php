<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campus
{
    public $id;
    public $ip;
    public $location;

    public function __construct($user = NULL)
    {
        if ($user != NULL) {
            $this->id = $user->id;
            $this->location = $user->location;
            $this->ip = $user->ip;
        }
    }

    public static function all(){
        $response = httpRequest('get', '/campus');
        $users = [];
        if ($response->status == 'success') {
            foreach ($response->result as $user) {
                $users[] = new Campus($user);
            }
        }
        return $users;
    }
}
