<?php 
namespace App\Helpers;

class OrderHelper
{
    const PENDING = 'pending';
    const COMPLETED = 'completed';
    const CANCELLED = 'cancelled';
    
    public const ORDER_STATUSES = [
        self::PENDING,
        self::COMPLETED,
        self::CANCELLED,
    ];

}