<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PasteController extends Controller
{
    public function boot() 
    {

        Route::pattern('name', '[A-Za-z-]');

        parent::boot();

    }

    public function __invoke($name)
    {
        
        $paste = \App\Pastes::where('unique_name', '=', $name)->value('content');
        return view('paste', ['name' => $name, 'content' => $paste]);

    }

    public function save()
    {

    }
}
