<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'name', 'description', 'price', 'user_id', 'image_id'
    ];

    public function image()
    {
        return $this->belongsTo(Images::class);
    }

}
