<?php


use App\Services\Searchable\EloquentSearchColumns;
use App\Services\Searchable\EloquentSorteableColumns;

return [
    'search'=>EloquentSearchColumns::class,
    'order_by'=>EloquentSorteableColumns::class
];
