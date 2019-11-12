<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participate extends Model
{
    protected $fillable = [
        'event_id', 'user_id'
    ];


    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->table = "participate";
    }


}
