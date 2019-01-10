<?php

namespace App\Http\Controllers;

use App\Reminder;
use Cron\CronExpression;
use Illuminate\Http\Request;
use App\Scheduler\FrequencyBuilder;

class ReminderController extends Controller
{
    public function index()
    {
        $reminders = Reminder::all();

        return view('reminders.index', compact('reminders'));
    }

    public function create()
    {
        return view('reminders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'body'      => 'required',
            'frequency' => 'required',
        ]);

        $expression = $this->buildCronExpression($request);

        if (CronExpression::isValidExpression($expression)) {
            $reminder = new Reminder;

            $reminder->body = $request->get('body');
            $reminder->frequency = $request->get('frequency');
            $reminder->day = $request->get('day');
            $reminder->date = $request->get('date');
            $reminder->time = $request->get('time');
            $reminder->run_once = $request->get('run_once', false);
            $reminder->expression = $expression;

            $reminder->save();
        } else {
            return back()->withInput()->withErrors([
                'expression' => 'You must provide a valid cron expression',
            ]);
        }

        return back();
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

    public function destroy(Request $request, Reminder $reminder)
    {
        $reminder->delete();

        return back();
    }
}
