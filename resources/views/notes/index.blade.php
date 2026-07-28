@extends('layouts.app')

@section('content')
<h1>All Notes</h1>

<form action="{{ route('notes.index') }}" method="GET" class="mb-4">

    <div class="input-group">

        <input
            type="text"
            name="search"
            class="form-control"
            placeholder="Search notes..."
            value="{{ request('search') }}"
        >

        <button class="btn btn-primary" type="submit">
            🔍 Search
        </button>

    </div>

</form>

<br>

@forelse($notes as $note)

<div class="card mb-3">

    <div class="card-body">

        <h3 class="card-title">{{ $note->title }}</h3>

        @if($note->deleted_at)
            <span class="badge bg-danger">Deleted</span>
        @endif

        <p class="card-text mt-2">
            {{ $note->description }}
        </p>

        <div class="d-flex gap-2 mt-3">
            <a href="{{ route('notes.show', $note) }}" class="btn btn-primary btn-sm">
                View
            </a>
            <a href="{{ route('notes.edit', $note) }}" class="btn btn-secondary btn-sm">
                Edit
            </a>

            @if(!$note->deleted_at)

                <form action="{{ route('notes.destroy', $note) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm">
                        Delete
                    </button>
                </form>

            @else

                <form action="{{ route('notes.restore', $note) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <button type="submit" class="btn btn-success btn-sm">
                        Restore
                    </button>
                </form>

                <form action="{{ route('notes.forceDelete', $note) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-dark btn-sm">
                        💥 Delete Forever
                    </button>
                </form>

            @endif
        </div>
    </div>
</div>

@empty

    <h3>No notes found.</h3>

@endforelse

{{ $notes->links() }}

@endsection