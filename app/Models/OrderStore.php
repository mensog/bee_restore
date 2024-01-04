<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderStore extends Model
{
    public function order()
    {
        return $this->belongsTo('App\Order');
    }

    public function store()
    {
        return $this->belongsTo('App\Partner');
    }
}
