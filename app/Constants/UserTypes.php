<?php

namespace App\Constants;

final class UserTypes
{
    const NORMAL = 1;
    const ADMIN = 2;


    public static function getList()
    {
        return [
            UserTypes::NORMAL => 'Normal',
            UserTypes::ADMIN => 'Admin',

        ];
    }
}
