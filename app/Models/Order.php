<?php

namespace App;

use App\Notifications\OrderCanceledNotification;
use App\Notifications\OrderCompletedNotification;
use App\Notifications\OrderGivenToCourierNotification;
use App\Notifications\OrderOrderedNotification;
use App\Notifications\OrderPaidNotification;
use App\Notifications\OrderReadyForDeliveryNotification;
use App\Notifications\OrderReDeliveryNotification;
use App\Notifications\OrderRefundedNotification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Order extends Model
{
    use Notifiable;
    const WEIGHT_MAX_LIMIT = 30000;
    const WEIGHT_MIN_LIMIT = 1000;
    /**
     * Возвращает все товарные позиции из текущего заказа
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function items()
    {
        return $this->hasMany('App\OrderItem');
    }

    /**
     * Создает позиции заказа на основе содержимого переданной корзины
     *
     * @param Cart $cart
     */
    public function fillFromCart(Cart $cart)
    {
        $cartContent = $cart->content;
        $productIds = array_keys($cartContent);
        Product::find($productIds)->pluck('price', 'id')->each(function ($price, $productId) use ($cartContent) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $this->id;
            $orderItem->product_id = $productId;
            $orderItem->price = $price;
            $orderItem->quantity = $cartContent[$productId];
            $orderItem->stock_quantity = $cartContent[$productId];
            $orderItem->save();
        });
    }

    public function getItemsSum()
    {
        $sum = 0;
        $items = $this->items;
        foreach ($items as $item) {
            $sum += $item->getSum();
        }
        return $sum;
    }

    /**
     * Возвращает сумму заказа
     *
     * @return int
     */
    public function getSum()
    {
        $sum = $this->getItemsSum();
        $deliveryPrice = $this->delivery_amount;
        if($deliveryPrice) {
            $sum += $deliveryPrice;
        }
        return $sum;
    }

    public function getFinalSum() {
        $sum = 0;
        $items = $this->items;
        foreach ($items as $item) {
            $sum += $item->getInStockSum();
        }
        if ($this->delivery_amount) {
            $sum += $this->delivery_amount;
        }
        if ($this->promocode_discount) {
            $sum -= $this->promocode_discount;
        }
        if ($this->bonus_discount) {
            $sum -= $this->bonus_discount;
        }
        return $sum;
    }

    public function courier()
    {
        return $this->belongsTo('App\Courier');
    }

    public function orderStores()
    {
        return $this->hasMany('App\OrderStore');
    }

    public function fillOrderStores()
    {
        $stores = [];
        foreach ($this->items as $item) {
            $storeId = $item->product->store_id;
            if (!in_array($storeId, $stores)) {
                $stores[] = $item->product->store_id;
                $orderStore = new OrderStore();
                $orderStore->order_id = $this->id;
                $orderStore->store_id = $storeId;
                $orderStore->status = OrderStoreStatus::PAID;
                $orderStore->save();
            }
        }
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function delivery()
    {
        return $this->belongsTo('App\Delivery');
    }

    public function routeNotificationForMail()
    {
        return $this->email;
    }

    public function sendStatusNotification()
    {
        if ($this->status == OrderStatus::PAID) {
            $this->user->notify(new OrderPaidNotification($this));
        }
        if ($this->status == OrderStatus::CANCELED) {
            $this->user->notify(new OrderCanceledNotification($this));
        }
        if ($this->status == OrderStatus::COMPLETED) {
            $this->user->notify(new OrderCompletedNotification($this));
        }
        if ($this->status == OrderStatus::READY_FOR_DELIVERY) {
            $this->user->notify(new OrderReadyForDeliveryNotification($this));
        }
        if ($this->status == OrderStatus::GIVEN_TO_COURIER) {
            $this->user->notify(new OrderGivenToCourierNotification($this));
        }
        if ($this->status == OrderStatus::RE_DELIVERY) {
            $this->user->notify(new OrderReDeliveryNotification($this));
        }
        if ($this->status == OrderStatus::ORDERED) {
            $this->user->notify(new OrderOrderedNotification($this));
        }
    }

    public function takeNumber($number)
    {
        $phone = str_replace(['+', '(', ')', '-', ' '], '', $number);
        return  preg_replace('/^./', 7, $phone);

    }
}
