<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    /**
     * Возвращает категорию текущего товара
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function orderItem()
    {
        return $this->hasMany('App\Models\OrderItem');
    }

    public function productAttributeValues()
    {
        return $this->hasMany('App\Models\ProductAttributeValue');
    }

    public function getStoreName()
    {
        $name = '';
        switch ($this->store_id) {
            case 1:
                $name = "Леруа Мерлен";
                break;
            case 2:
                $name = "OBI";
                break;
            case 3:
                $name = "Петрович";
                break;
            case 4:
                $name = "Castorama";
                break;
            default:
                $name = "";
        }
        return $name;
    }

    public function getStoreProductLink()
    {
        if ($this->store_id == 1) {
            return 'https://leroymerlin.ru' . $this->parse_url;
        } else if ($this->store_id == 2) {
            return 'https://www.obi.ru' . $this->parse_url;
        } else {
            return $this->parse_url;
        }
    }

    public function store()
    {
        return $this->belongsTo('App\Models\Partner','store_id', 'id');
    }

    public function reviews()
    {
        return $this->hasMany('App\Models\Review');
    }

    public function getRating()
    {
        return round($this->reviews->avg('rating'), 1);
    }
}
