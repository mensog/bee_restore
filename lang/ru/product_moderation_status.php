<?php
use App\Models\ProductModerationStatus;

return [
    ProductModerationStatus::WAITING => 'Ожидает модерации',
    ProductModerationStatus::DONE => 'Модерация пройдена',
    ProductModerationStatus::REJECTED => 'Модерация не пройдена',
];
