<?php

namespace App\Http\Controllers;

use App\Note;
use App\Notebook;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function show(Notebook $notebook, Note $note)
    {
        $notebooks = Notebook::get();
        $notes     = $notebook->notes()->get();
        
        return view('notebooks.index', compact('notebooks', 'notebook', 'notes', 'note'));
    }
}
