<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    /* Authorize fields of the table to be filled */
    protected $fillable = [
        'images_past_events_id', 'user_id'
    ];
}
