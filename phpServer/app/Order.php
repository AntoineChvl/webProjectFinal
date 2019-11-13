<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = [
        'price','user_id'
    ];

    public function contains() {
        return $this->hasMany(Contain::class);
    }

}
