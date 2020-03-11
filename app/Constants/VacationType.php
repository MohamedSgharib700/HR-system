<?php

namespace App\Constants;

final class VacationType
{
    const ANNUAL = 1;
    const SICK = 2;
    const HALFDAY = 3;
    const OTHER = 4;


    public static function getList()
    {
        return [
            VacationType::ANNUAL => 'Annual',
            VacationType::SICK => 'Sick',
            VacationType::HALFDAY => 'Half day',
            VacationType::OTHER => 'Other',
        ];
    }

    public static function getOne($index = '')
    {
        $list = self::getList();
        $listOne = '';
        if ($index) {
            $listOne = $list[$index];
        }
        return $listOne;
    }
}
