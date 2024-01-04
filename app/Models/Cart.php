<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;

class Cart extends Model
{
    const CART_ID_COOKIE_NAME = 'cartId';
    const CART_ID_COOKIE_EXPIRES = 30 * 24 * 3600;

    protected $products;

    /**
     * @return Cart
     */
    public static function current()
    {
        if (Auth::check()) {
            return static::getByUserId(Auth::id());
        }
        return static::currentByCookie();
    }

    private static function currentByCookie()
    {
        $cookie = Cookie::get(self::CART_ID_COOKIE_NAME);
        if ($cookie) {
            try {
                $cartId = Crypt::decrypt(Cookie::get(self::CART_ID_COOKIE_NAME), false);
            } catch (\Exception $exception) {
                $cartId = $cookie;
            }
        } else {
            $cartId = null;
        }
        $cart = static::where('id', $cartId)->firstOr(function () {
            $cart = new Cart();
            $cart->content = [];
            $cart->save();
            Cookie::queue(self::CART_ID_COOKIE_NAME, $cart->id, self::CART_ID_COOKIE_EXPIRES);
            return $cart;
        });
        return $cart;
    }

    private static function getByUserId($userId)
    {
        $cart = static::where('user_id', $userId)->firstOr(function () use ($userId) {
            $cart = new Cart();
            $cart->content = [];
            $cart->user_id = $userId;
            $cart->save();
            return $cart;
        });
        return $cart;
    }

    public function getContentAttribute($value)
    {
        return json_decode($value, true);
    }

    public function setContentAttribute($value)
    {
        $this->attributes['content'] = json_encode($value);
    }

    /**
     * Добавляет товар в корзину
     * @param $productId int ID товара
     * @param $quantity int Количество
     * или пытаемся добавить 0 или отрицательное количество товаров
     */
    public function addProduct(int $productId, int $quantity)
    {
        $content = $this->content;
        if (isset($content[$productId])) {
            $this->updateProductQuantity($productId, $quantity);
        } else {
            $content[$productId] = $quantity;
        }
        $this->content = $content;
        $this->save();
        $this->initProducts();
    }

    /**
     * Удаляет товар из корзины
     *
     * @param int $productId ID товара
     */
    public function removeProduct(int $productId)
    {
        $content = $this->content;
        if (isset($content[$productId])) {
            unset($content[$productId]);
        }
        $this->content = $content;
        $this->save();
        $this->initProducts();
    }

    /**
     * Очищает корзину
     */
    public function clear()
    {
        $this->content = [];
        $this->promocode = null;
        $this->bonus_discount = 0;
        $this->save();
    }

    public function updateProductQuantity(int $productId, int $quantity)
    {
        if (isset($this->content[$productId])) {
            if ($quantity == 0) {
                $this->removeProduct($productId);
            } else {
                $content = $this->content;
                $content[$productId] = $quantity;
                $this->content = $content;
                $this->save();
                $this->initProducts();
            }
        } else {
            $this->addProduct($productId, $quantity);
        }
    }

    public function countTotalQuantity()
    {
        $count = 0;
        foreach ($this->content as $productId => $quantity) {
            $count += $quantity;
        }
        return $count;
    }

    public function getTotal()
    {
        if (is_null($this->products)) {
            $this->initProducts();
        }
        $total = 0;
        $cartContent = $this->content;
        foreach ($this->products as $product) {
            $total += $cartContent[$product->id] * $product->price;
        }
        return $total;
    }

    protected function initProducts()
    {
        $productIds = $this->getProductIds();
        $this->products = Product::with('store')->find($productIds);
    }

    public function getProducts()
    {
        if (is_null($this->products)) {
            $this->initProducts();
        }
        return $this->products;
    }

    public function getProductIds()
    {
        $cartContent = $this->content;
        return array_keys($cartContent);
    }

    public function getItemsSubTotal()
    {
        if (is_null($this->products)) {
            $this->initProducts();
        }
        $itemsSubTotal = [];
        $cartContent = $this->content;
        foreach ($this->products as $product) {
            $itemsSubTotal[$product->id] = $cartContent[$product->id] * $product->price;
        }
        return $itemsSubTotal;
    }

    public static function mergeCarts($userId)
    {
        $cookieCart = static::currentByCookie();
        $userIdCart = static::getByUserId($userId);
        $mergedContent = [];
        foreach (array_keys($cookieCart->content + $userIdCart->content) as $key) {
            $mergedContent[$key] = (isset($cookieCart->content[$key]) ? $cookieCart->content[$key] : 0) + (isset($userIdCart->content[$key]) ? $userIdCart->content[$key] : 0);
        }
        $userIdCart->content = $mergedContent;
        $userIdCart->save();
        $cookieCart->delete();
    }

    public static function deleteExpiredCarts()
    {
        Cart::where('updated_at', '<', Carbon::now()->subSeconds(self::CART_ID_COOKIE_EXPIRES))->whereNull('user_id')->delete();
    }

    public function getTotalWeight()
    {
        $totalWeight = 0;
        foreach ($this->getProducts()->pluck('weight', 'id') as $key => $weight) {
            $totalWeight += (int)$weight * $this->content[$key];
        }
        return $totalWeight;
    }
}
