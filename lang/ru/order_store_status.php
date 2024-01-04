<?php

use App\Models\OrderStoreStatus;

return [
    OrderStoreStatus::CANCELED => 'Отменен',
    OrderStoreStatus::READY_FOR_DELIVERY => 'Готов к выдаче',
    OrderStoreStatus::CREATED => 'Создан',
    OrderStoreStatus::ORDERED => 'Заказан',
    OrderStoreStatus::PAID => 'Оплачен',
];
