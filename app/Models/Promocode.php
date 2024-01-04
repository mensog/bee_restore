<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promocode extends Model
{
    public function getCurrencyAmountFromTotal($total)
    {
        if ($this->amount_type == PromocodeType::ABSOLUT) {
            return (int) $this->amount;
        } elseif ($this->amount_type == PromocodeType::PERCENTAGE)
        {
            return (int) ($total * $this->amount / 100);
        }
    }
}
