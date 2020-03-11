<?php

namespace App\Constants;

final class VacationStatus
{
    const PENDING = 0;
    const APPROVE = 1;
    const DISAPPROVE = 2;

    public static function getList()
    {
        return [
            VacationStatus::PENDING => 'Pending',
            VacationStatus::APPROVE => 'Approve',
            VacationStatus::DISAPPROVE => 'Disapprove',
        ];
    }


    public static function getOne($key)
    {
        if (!array_key_exists($key, self::getList())) {
            return "";
        }
        return self::getList()[$key];
    }
}
