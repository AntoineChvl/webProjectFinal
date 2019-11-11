<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagesPastEvent extends Model
{
    protected $fillable = [
        'event_id', 'image_id'
    ];

    public function image()
    {
        return $this->belongsTo(Images::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'images_past_events_id');
    }




}
