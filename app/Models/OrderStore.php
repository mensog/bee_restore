<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderStore extends Model
{
    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }

    public function store()
    {
        return $this->belongsTo('App\Models\Partner');
    }
}
