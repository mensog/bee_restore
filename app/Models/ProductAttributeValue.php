<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttributeValue extends Model
{
    public function products()
    {
        return $this->belongsTo('App\Models\Product');
    }

    public function productAttribute()
    {
        return $this->belongsTo('App\Models\ProductAttribute');
    }
}
