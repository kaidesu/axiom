<?php

namespace App\Support;

use DatePeriod;
use DateTime;
use DateInterval;

class Date
{
    public static function range($start, $end, $interval = 'PT30M')
    {
        return new DatePeriod(
            new DateTime($start), new DateInterval($interval), new DateTime($end)
        );
    }

    public static function frequencies()
    {
        return [
            'everyMinute'        => 'Every minute',
            'everyTenMinutes'    => 'Every ten minutes',
            'everyThirtyMinutes' => 'Every thirty minutes',
            'hourly'             => 'Every hour',
            'daily'              => 'Every day',
            'weekly'             => 'Every week',
            'monthly'            => 'Every month',
            'yearly'             => 'Every year',
        ];
    }

    public static function days()
    {
        return [
            1 => 'Monday',
            2 => 'Tuesday',
            3 => 'Wednesday',
            4 => 'Thursday',
            5 => 'Friday',
            6 => 'Saturday',
            7 => 'Sunday',
        ];
    }

    public static function ordinal($value)
    {
        $ends = ['th', 'st', 'nd', 'rd', 'th', 'th', 'th', 'th', 'th', 'th'];

        if ((($value % 100) >= 11) and (($value % 100) <= 13)) {
            return $value.'th';
        }

        return $value.$ends[$value % 10];
    }
}