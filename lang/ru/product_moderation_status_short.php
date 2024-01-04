<?php
use App\Models\ProductModerationStatus;

return [
    ProductModerationStatus::WAITING => 'ожидает',
    ProductModerationStatus::DONE => 'пройдена',
    ProductModerationStatus::REJECTED => 'не пройдена',
];
