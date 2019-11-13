<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contain extends Model
{
    //
    protected $table = 'contain';
    public $timestamps = false;
    protected $fillable = [
        'quantity','product_id','order_id'
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
