<?php

namespace App\Constants;

final class MaritalStatus
{
    const SINGLE = 1;
    const MARRIED = 2;
    const DIVORCED = 3;

    public static function getList()
    {
        return [
            MaritalStatus::SINGLE => 'SINGLE',
            MaritalStatus::MARRIED => 'MARRIED',
            MaritalStatus::DIVORCED => 'DIVORCED',

        ];
    }
}
