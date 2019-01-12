<?php

namespace App\Http\Controllers\API;

use App\Reminder;
use Cron\CronExpression;
use Illuminate\Http\Request;
use App\Scheduler\FrequencyBuilder;
use App\Http\Controllers\Controller;

class ReminderController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'body'      => 'required',
            'frequency' => 'required',
        ]);

        $expression = $this->buildCronExpression($request);

        if (CronExpression::isValidExpression($expression)) {
            $reminder = new Reminder;

            $reminder->body       = $request->get('body');
            $reminder->frequency  = $request->get('frequency');
            $reminder->day        = $request->get('day');
            $reminder->date       = $request->get('date');
            $reminder->time       = $request->get('time');
            $reminder->run_once   = $request->get('run_once', false);
            $reminder->expression = $expression;

            $reminder->save();
            
            return response(200);
        }
        
        // You must provide a valid cron expression
        return response(422);
    }

    protected function buildCronExpression(Request $request)
    {
        if ($request->get('time')) {
            list($hour, $minute) = explode(':', $request->get('time'));
        } else {
            $hour   = null;
            $minute = null;
        }

        $builder = new FrequencyBuilder;

        $builder->frequency($request->get('frequency'));
        $builder->day($request->get('day'));
        $builder->date($request->get('date'));
        $builder->time((int) $hour, (int) $minute);

        return $builder->expression();
    }
}