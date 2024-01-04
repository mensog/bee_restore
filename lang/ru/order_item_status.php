<?php

return [
    \App\Models\OrderStatus::PENDING => 'В ожидании',
    \App\Models\OrderStatus::COMPLETED => 'Заказ доставлен',
    \App\Models\OrderStatus::CANCELED => 'Заказ отменен',
    \App\Models\OrderStatus::PAID => 'Заказ оплачен',
    \App\Models\OrderStatus::READY_FOR_DELIVERY => 'Готов к выдаче курьеру',
    \App\Models\OrderStatus::GIVEN_TO_COURIER => 'Передан курьеру',
    \App\Models\OrderStatus::RE_DELIVERY => 'Повторная доставка',
    \App\Models\OrderStatus::REFUNDED => 'Заказ возвращен',
    \App\Models\OrderStatus::CREATED => 'Заказ создан',
];
