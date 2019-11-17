<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name', 'description', 'location', 'date', 'price', 'user_id', 'image_id', 'is_validated', 'restricted_at'
    ];

    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    public function imagesPostedByUsers()
    {
        return $this->hasMany(ImagePastEvent::class)->orderBy('updated_at','DESC');
    }

    public function validate()
    {
        $this->is_validated = 0;
        $this->restricted_at = now();
        $this->save();
    }
}
