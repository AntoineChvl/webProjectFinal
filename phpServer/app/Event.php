<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name', 'description', 'location', 'date', 'price'
    ];

    public function image()
    {
        return $this->hasOne(Images::class, 'image_id');
    }
}
