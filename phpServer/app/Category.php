<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /* Variable containing the table's name */
    protected $table = 'categories';

    /* Authorize fields of the table to be filled */
    protected $fillable = ['name'];

    /* Get all the products related to a category */
    public function products(){
        return $this->belongsToMany(Product::class,'have','category_id','product_id');
    }
}
