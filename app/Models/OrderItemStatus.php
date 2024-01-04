<?php

namespace App\Models;


class OrderItemStatus
{
    const PENDING = 'OrderPending';
    const COMPLETED = 'OrderCompleted';
    const CANCELED = 'OrderCanceled';
    const PAID = 'OrderPaided';
    const READY_FOR_DELIVERY = 'OrderReadyForDelivery';
    const GIVEN_TO_COURIER = 'OrderGivenToCourier';
    const RE_DELIVERY = 'OrderReDelivery';
    const REFUNDED = 'OrderRefunded';
    const CREATED = 'OrderCreated';
}
