<?php 
namespace App\Helpers;

class UserHelper
{
    const ADMIN = 'admin';
    const CUSTOMER = 'customer';
    const GUEST = 'guest';
    
    public const USER_ROLES = [
        self::ADMIN,
        self::CUSTOMER,
        self::GUEST,
    ];

}