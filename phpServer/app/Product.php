<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /* Authorize fields of the table to be filled */
    protected $fillable = [
        'name', 'description', 'price', 'user_id', 'image_id'
    ];

    /* Get the image about a product */
    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    /* Get all the categories describing a product */
    public function categories()
    {
        return $this->belongsToMany(Category::class,"have");
    }

    /* Get the quantity of a product in an order */
    public function contained()
    {
        return $this->hasMany(Contain::class);
    }
}
