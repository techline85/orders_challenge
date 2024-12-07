<?php

namespace App\Helpers;

class OrderHelper
{
    public const PENDING = 'pending';
    public const COMPLETED = 'completed';
    public const CANCELLED = 'cancelled';

    public const ORDER_STATUSES =[
        self::PENDING,
        self::COMPLETED,
        self::CANCELLED,
    ];
}
