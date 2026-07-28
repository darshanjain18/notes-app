@extends('layouts.app')

@section('content')
<h1>All Notes</h1>

<form action="{{ route('notes.index') }}" method="GET">

    <input
        type="text"
        name="search"
        placeholder="Search notes..."
        value="{{ request('search') }}"
    >

    <button type="submit">Search</button>

</form>

<br>

@forelse($notes as $note)

    <h3>{{ $note->title }}</h3>

    @if($note->deleted_at)
        <p>🗑️ Deleted</p>
    @endif

    <p>{{ $note->description }}</p>

    <a href="{{ route('notes.show', $note) }}">View</a>
    <a href="{{ route('notes.edit', $note) }}">Edit</a>

    @if(!$note->deleted_at)

        <form action="{{ route('notes.destroy', $note) }}" method="POST">
            @csrf
            @method('DELETE')

            <button type="submit">
                Delete
            </button>
        </form>

    @else

        <form action="{{ route('notes.restore', $note) }}" method="POST">
            @csrf
            @method('PATCH')

            <button type="submit">
                Restore
            </button>
        </form>

        <form action="{{ route('notes.forceDelete', $note) }}" method="POST">
            @csrf
            @method('DELETE')

            <button type="submit">
                💥 Delete Forever
            </button>
        </form>

    @endif

    <hr>

@empty

    <h3>No notes found.</h3>

@endforelse

@endsection