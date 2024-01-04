<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrivateAccount extends Model
{
    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function getTotalAmount()
    {
        return $this->refund_amount + $this->bonus_amount;
    }

    public function withdraw($amount)
    {
        if ($amount > $this->getTotalAmount()) {
            return false;
        }
        if ($this->refund_amount >= $amount) {
            $this->refund_amount -= $amount;
            $this->save();
            return true;
        } else {
            $withdrawFromBonus = $amount - $this->refund_amount;
            $this->refund_amount = 0;
            $this->bonus_amount -= $withdrawFromBonus;
            $this->save();
            return true;
        }
    }
}
