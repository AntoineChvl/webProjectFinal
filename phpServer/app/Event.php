<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /* Authorize fields of the table to be filled */
    protected $fillable = [
        'name', 'description', 'location', 'date', 'price', 'user_id', 'image_id', 'is_validated', 'restricted_at'
    ];

    /* Get the image that describes the event */
    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    /* Get all images posted by users on the event */
    public function imagesPostedByUsers()
    {
        return $this->hasMany(ImagePastEvent::class)->orderBy('updated_at','DESC');
    }

    /* Soft deleting of an event */
    public function validate()
    {
        $this->is_validated = 0;
        $this->restricted_at = now();
        $this->save();
    }
}
