<?php

namespace App\Http\Controllers\API;

use App\Notebook;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotebookController extends Controller
{
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title'       => 'required',
            'description' => 'required',
        ]);
        
        auth()->user()->notebooks()->create($attributes);
        
        return response(200);
    }
}