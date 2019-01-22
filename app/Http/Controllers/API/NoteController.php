<?php

namespace App\Http\Controllers\API;

use App\Note;
use App\Notebook;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NoteController extends Controller
{
    public function store(Notebook $notebook)
    {
        if (auth()->user()->isNot($notebook->owner)) {
            abort(403);
        }
        
        $attributes = request()->validate([
            'title' => 'required',
            'body'  => 'max:65535',
        ]);
        
        $notebook->addNote($attributes);

        return response(200);
    }
}