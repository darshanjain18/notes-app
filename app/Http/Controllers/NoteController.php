<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    //
    public function index()
    {
        $notes = Note::withTrashed()->get();
        return view('notes.index',['notes' => $notes]);
    }

    public function create()
    {
        return view('notes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        Note::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        return redirect()->route('notes.index');
    }
    
    public function show(Note $note)
    {
        return view('notes.show',compact('note'));
    }

    public function edit(Note $note)
    {
        return view('notes.edit',compact('note'));
    }

    public function update(Request $request, Note $note)
    {
     $request->validate([
        'title' => 'required',
        'description' => 'required',
     ]);

     $note->update([
        'title' => $request->title,
        'description' => $request->description,
    ]);

    return redirect()->route('notes.index');
    }

    public function destroy(Note $note)
    {
        $note->delete();
        return redirect()->route('notes.index');  
     
    }

     
}
