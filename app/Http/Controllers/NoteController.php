<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    //
    public function create()
    {
        return view('notes.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);
    dd($request->input('title'));
    }
}
