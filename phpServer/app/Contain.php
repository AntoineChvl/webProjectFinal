<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contain extends Model
{
    /* Variable containing the table's name */
    protected $table = 'contain';

    /* Not including the defaults timestamps */
    public $timestamps = false;

    /* Authorize fields of the table to be filled */
    protected $fillable = [
        'quantity','product_id','order_id'
    ];

    /* Make a link between an order and its products */

    /* Get the order about a product */
    public function order()
    {
        return $this->has(Order::class);
    }

    /* Get the products about a order */
    public function product()
    {
        return $this->has(Product::class);
    }

}
