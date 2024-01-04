<?php

return [
    \App\Models\OrderStoreStatus::CANCELED => 'Отменен',
    \App\Models\OrderStoreStatus::READY_FOR_DELIVERY => 'Готов к выдаче',
    \App\Models\OrderStoreStatus::CREATED => 'Создан',
    \App\Models\OrderStoreStatus::ORDERED => 'Заказан',
    \App\Models\OrderStoreStatus::PAID => 'Оплачен',
];
