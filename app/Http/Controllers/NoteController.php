<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Note;


class NoteController extends Controller
{
    //
    public function index(Request $request)
    {
    $search = $request->search;

    $notes = Note::withTrashed()->when($search, function ($query) use ($search) {
    $query->where('title', 'like', "%{$search}%")
          ->orWhere('description', 'like', "%{$search}%");
})
        ->latest()
        ->get();

    return view('notes.index', compact('notes'));
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
        return redirect()->route('notes.index')->with('success', 'Note created successfully!');
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

    return redirect()->route('notes.index')->with('success', 'Note updated successfully!');
    }

    public function destroy(Note $note)
    {
        $note->delete();
        return redirect()->route('notes.index')->with('success', 'Note deleted successfully!');
    }

    public function restore($id)
    {
        $note = Note::withTrashed()->findOrFail($id);
        $note->restore();
        return redirect()->route('notes.index')->with('success', 'Note restored successfully!');
    }

    public function forceDelete($id)
    {
        $note = Note::withTrashed()->findOrFail($id);
        $note->forceDelete();
        return redirect()->route('notes.index')->with('success', 'Note permanently deleted!');

    }

     
}
