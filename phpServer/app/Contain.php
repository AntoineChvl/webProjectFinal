<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contain extends Model
{
    //
    protected $fillable = [
        'quantity'
    ];

    public function order()
    {
        return $this->has(Order::class);
    }

    public function product()
    {
        return $this->has(Product::class);
    }

}
