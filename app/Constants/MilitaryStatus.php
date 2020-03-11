<?php

namespace App\Constants;

final class MilitaryStatus
{
    const EXEMPTION = 1;
    const COMPLETE_THE_SERVICE_MILITARY = 2;
    const POSTPONED = 3;
    const DOES_NOT_APPLY = 4;
    const CURRENTLY_SERVING = 5;


    public static function getList()
    {
        return [
            MilitaryStatus::EXEMPTION => 'EXEMPTION',
            MilitaryStatus::COMPLETE_THE_SERVICE_MILITARY => 'COMPLETE THE SERVICE MILITARY',
            MilitaryStatus::POSTPONED => 'POSTPONED',
            MilitaryStatus::DOES_NOT_APPLY => 'DOES NOT APPLY',
            MilitaryStatus::CURRENTLY_SERVING => 'CURRENTLY SERVING',

        ];
    }

}
