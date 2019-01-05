<?php

namespace App;

use App\Support\Date;
use Illuminate\Database\Eloquent\Model;

class Reminder extends Model
{
    protected $fillable = [
        'body',
        'frequency',
        'day',
        'date',
        'time',
        'expression',
        'run_once',
    ];

    public function getFrequencyAttribute($value)
    {
        return array_get(Date::frequencies(), $value);
    }

    public function getDayAttribute($value)
    {
        if (is_null($value)) return;

        return array_get(Date::days(), $value);
    }

    public function getDateAttribute($value)
    {
        if (is_null($value)) return;
        
        return Date::ordinal($value);
    }
}
