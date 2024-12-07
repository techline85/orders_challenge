<?php

namespace App\Helpers;

class UserHelper
{
    public const ADMIN = 'admin';
    public const CUSTOMER = 'customer';
    public const GUEST = 'guest';

    public const USER_ROLES = [
        self::ADMIN,
        self::CUSTOMER,
        self::GUEST,
    ];
}
