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
        return $this->belongsTo(Image::class);
    }

    public function imagesPostedByUsers()
    {
        return $this->hasMany(ImagePastEvent::class)->orderBy('updated_at','DESC');
    }
}
