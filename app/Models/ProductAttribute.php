<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    public function productAttributeValues()
    {
        return $this->hasMany('App\ProductAttributeValue');
    }
}
