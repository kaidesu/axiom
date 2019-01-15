<?php

namespace App\Http\Controllers\API;

use App\Task;
use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectTaskController extends Controller
{
    public function store(Project $project)
    {
        if (auth()->user()->isNot($project->owner)) {
            abort(403);
        }
        
        request()->validate([
            'body' => 'required'
        ]);
        
        $project->addTask(request('body'));

        return response(200);
    }

    public function update(Project $project, Task $task)
    {
        $this->withoutExceptionHandling();
        
        $task->update([
            'body'      => request('body'),
            'completed' => request()->has('completed')
        ]);
    }
}