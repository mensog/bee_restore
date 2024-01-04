<?php
use App\Models\OrderStatus;

return [
    OrderStatus::PENDING => 'В ожидании',
    OrderStatus::COMPLETED => 'Заказ доставлен',
    OrderStatus::CANCELED => 'Заказ отменен',
    OrderStatus::PAID => 'Заказ оплачен',
    OrderStatus::READY_FOR_DELIVERY => 'Готов к выдаче курьеру',
    OrderStatus::GIVEN_TO_COURIER => 'Передан курьеру',
    OrderStatus::RE_DELIVERY => 'Повторная доставка',
    OrderStatus::REFUNDED => 'Заказ возвращен',
    OrderStatus::CREATED => 'Заказ создан',
];
