<?php

namespace App;


class OrderStoreStatus
{
    const CANCELED = 'OrderCanceled';
    const CREATED = 'OrderCreated';
    const ORDERED = 'OrderOrdered';
    const PAID = 'OrderPaided';
    const READY_FOR_DELIVERY = 'OrderReadyForDelivery';
}
