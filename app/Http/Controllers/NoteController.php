<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Note;
use Illuminate\Support\Facades\Storage;


class NoteController extends Controller
{
    //
    public function index(Request $request)
    {
    $search = trim($request->search);
    $author = trim($request->author);

    $notes = Note::where('user_id', auth()->id())->select([
        'id',
        'title',
        'description',
        'user_id',
        'created_at', 'deleted_at'
    ])
    ->withTrashed()
    ->with([
        'user' => function ($query) {
            $query->select('id', 'name')->withCount('notes');
        }
    ])
        
    ->when($search, function($query) use ($search){

        $query->search($search);

    })

    ->when($author, function ($query) use ($author){
        $query->byAuthor($author);
    })
        ->latest()
        ->paginate(3);

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
            'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',
        ]);

        $attachmentPath = null;
            if ($request->hasFile('attachment')) {

                $attachmentPath = $request
                    ->file('attachment')
                    ->store('notes', 'public');
            }

        Note::create([
            'title' => $request->title,
            'description' => $request->description,
            'attachment' => $attachmentPath,
            'user_id' => auth()->id()
        ]);
        return redirect()->route('notes.index')->with('success', 'Note created successfully!');
    }
    
    public function show(Note $note)
    {
        $this->authorize('view', $note);
        $note->loadMissing('user');
        return view('notes.show',compact('note'));
    }

    public function edit(Note $note)
    {
        $this->authorize('update', $note);
        return view('notes.edit',compact('note'));
    }

    public function update(Request $request, Note $note)
    {
     $this->authorize('update', $note);
     $request->validate([
        'title' => 'required',
        'description' => 'required',
        'attachment' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:2048',

     ]);

    $attachmentPath = $note->attachment;

    // Remove existing attachment
    if ($request->remove_attachment && $note->attachment) {

        Storage::disk('public')->delete($note->attachment);

        $attachmentPath = null;
    }

    // Replace with new attachment
    if ($request->hasFile('attachment')) {

        if ($note->attachment) {
            Storage::disk('public')->delete($note->attachment);
        }

        $attachmentPath = $request
            ->file('attachment')
            ->store('notes', 'public');
    }

     $note->update([
        'title' => $request->title,
        'description' => $request->description,
        'attachment' => $attachmentPath
    ]);

    return redirect()->route('notes.index')->with('success', 'Note updated successfully!');
    }

    public function destroy(Note $note)
    {
        $this->authorize('delete', $note);
        $note->delete();
        return redirect()->route('notes.index')->with('success', 'Note deleted successfully!');
    }

    public function restore(int $id)
    {
        $note = Note::withTrashed()->findOrFail($id);
        $this->authorize('restore', $note);
        $note->restore();
        return redirect()->route('notes.index')->with('success', 'Note restored successfully!');
    }

    public function forceDelete(int $id)
    {
        $note = Note::withTrashed()->findOrFail($id);
        $this->authorize('forceDelete', $note);
        $note->forceDelete();
        return redirect()->route('notes.index')->with('success', 'Note permanently deleted!');

    }

     
}
