<?php

namespace App\Support;

class Date
{
    public static function frequencies()
    {
        return [
            'daily' => 'Every day',
            'weekly' => 'Every week',
            'monthly' => 'Every month',
            'yearly' => 'Every year',
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