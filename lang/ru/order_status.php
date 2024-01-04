<?php

return [
    \App\OrderStatus::PENDING => 'В ожидании',
    \App\OrderStatus::COMPLETED => 'Заказ доставлен',
    \App\OrderStatus::CANCELED => 'Заказ отменен',
    \App\OrderStatus::PAID => 'Заказ оплачен',
    \App\OrderStatus::READY_FOR_DELIVERY => 'Готов к выдаче курьеру',
    \App\OrderStatus::GIVEN_TO_COURIER => 'Передан курьеру',
    \App\OrderStatus::RE_DELIVERY => 'Повторная доставка',
    \App\OrderStatus::REFUNDED => 'Заказ возвращен',
    \App\OrderStatus::CREATED => 'Заказ создан',
    \App\OrderStatus::ORDERED => 'Заказан',
];
