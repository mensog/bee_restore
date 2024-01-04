<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    /**
     * Атрибуты, которые нужно преобразовать в нативный тип
     *
     * @var array
     */
    protected $casts = [
        'price' => 'integer',
        'quantity' => 'integer',
    ];

    /**
     * Возвращает заказ для текущей товарной позиции заказа
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }

    /**
     * Возвращает сумму товарной позиции
     *
     * @return int
     */
    public function getSum()
    {
        return $this->price * $this->quantity;
    }

    public function getInStockSum()
    {
        return $this->price * $this->stock_quantity;
    }
}
