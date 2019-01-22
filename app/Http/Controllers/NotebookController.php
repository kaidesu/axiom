<?php

namespace App\Http\Controllers;

use App\Notebook;
use Illuminate\Http\Request;

class NotebookController extends Controller
{
    public function index()
    {
        $notebooks = Notebook::get();
        $notebook  = $notebooks->first();
        $notes     = $notebook->notes()->get();
        $note      = $notes->first();

        return view('notebooks.index', compact('notebooks', 'notebook', 'notes', 'note'));
    }

    public function show(Notebook $notebook)
    {
        $notebooks = Notebook::get();
        $notes     = $notebook->notes()->get();
        $note      = $notes->first();
        
        return view('notebooks.index', compact('notebooks', 'notebook', 'notes', 'note'));
    }
}
