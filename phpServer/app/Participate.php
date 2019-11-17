<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participate extends Model
{
    /* Authorize fields of the table to be filled */
    protected $fillable = [
        'event_id', 'user_id'
    ];

    protected $table= "participate";

    /* Get the event related to the participation */
    public function event(){
        return $this->hasOne(Event::class);
    }
}
