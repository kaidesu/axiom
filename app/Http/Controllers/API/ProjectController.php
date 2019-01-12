<?php

namespace App\Http\Controllers\API;

use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required',
            'description' => 'required',
        ]);

        $project = new Project;

        $project->title       = $request->get('title');
        $project->description = $request->get('description');

        $project->save();
        
        return response(200);
    }
}