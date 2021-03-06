<?php

namespace App\Http\Controllers\API;

use App\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title'       => 'required',
            'description' => 'required',
        ]);
        
        auth()->user()->projects()->create($attributes);
        
        return response(200);
    }
}