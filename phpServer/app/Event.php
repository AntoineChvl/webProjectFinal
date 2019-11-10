<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name', 'description', 'location', 'date', 'price', 'image_id'
    ];

    public function image()
    {
        return $this->belongsTo(Images::class);
    }

    public function imagesPostedByUsers()
    {
        return $this->hasMany(ImagesPastEvent::class);
    }
}
