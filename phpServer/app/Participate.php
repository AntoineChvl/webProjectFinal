<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participate extends Model
{
    protected $fillable = [
        'event_id', 'user_id'
    ];

    protected $table= "participate";
    public function event(){
        return $this->hasOne(Event::class);
    }
}
