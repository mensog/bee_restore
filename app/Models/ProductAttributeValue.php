<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAttributeValue extends Model
{
    public function products()
    {
        return $this->belongsTo('App\Product');
    }

    public function productAttribute()
    {
        return $this->belongsTo('App\ProductAttribute');
    }
}
