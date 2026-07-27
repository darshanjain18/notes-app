@extends('layouts.app')

@section('content')
<h1>All Notes</h1>

@foreach($notes as $note)

    <h3>{{ $note->title }}</h3>

    @if($note->deleted_at)
    <p>🗑️ Deleted</p>
    @endif

    <p>{{ $note->description }}</p>
    <a href="{{ route('notes.show', $note) }}">View</a>
    <a href="{{ route('notes.edit', $note->id) }}">Edit</a>
    
    <form action="{{ route('notes.destroy', $note->id) }}" method="POST">

    @csrf
    @method('DELETE')

    <br>

    <button type="submit">
        Delete
    </button>
    </form>
    

    <form action="{{ route('notes.restore', $note->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <button type="submit">
            Restore
        </button>
    </form>

    <form action="{{ route('notes.forceDelete', $note->id) }}" method="POST">
        @csrf
        @method('DELETE')

    <button type="submit">
        💥 Delete Forever
    </button>
    </form>
 
    <hr>

@endforeach

@endsection