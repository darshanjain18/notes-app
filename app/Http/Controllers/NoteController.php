<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Note;

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
            'description' => 'required',
        ]);
        Note::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        return redirect()->route('notes.index');
    }
    public function index()
    {
        $notes = Note::all();
        return view('notes.index',['notes' => $notes]);
    }
    public function edit(Note $note)
    {
        return view('notes.edit',['note' => $note]);
    }
    public function update(Request $request, $id)
    {
     $request->validate([
        'title' => 'required',
        'description' => 'required',
     ]);

    $note = Note::findorfail($id);

    $note->update([
        'title' => $request->title,
        'description' => $request->description,
    ]);

    return redirect()->route('notes.index');
    }
    public function destroy($id)
    {
        $note = Note::findorfail($id);
        $note->delete();
        return redirect()->route('notes.index');  
     
    }
}
