@extends('layouts.app')

@section('content')
<h1 class="display-5 fw-bold text-center mb-4">
    📝 Notes App
</h1>

<p class="text-center text-muted mb-5">
    Manage your notes efficiently with Laravel
</p>

<form action="{{ route('notes.index') }}" method="GET" class="mb-5">

    <div class="input-group input-group-lg">

        <input
            type="text"
            name="search"
            class="form-control"
            placeholder="🔍 Search by title or description..."
            value="{{ request('search') }}"
        >

        <button class="btn btn-primary px-4" type="submit">
            Search
        </button>

    </div>

</form>

<br>

@forelse($notes as $note)

<div class="card shadow-sm border-0 mb-4">

    <div class="card-body p-4">

        <h3 class="card-title fw-bold">
            📒 {{ $note->title }}
        </h3>

        <div class="mb-3">

            <span class="badge bg-primary">
                👤 {{ $note->user->name }}
            </span>

            <span class="badge bg-secondary">
                📝 {{ $note->user->notes_count }} Notes
            </span>

            <p class="text-muted">
                📅 Created:
                {{ $note->created_at }}
            </p>

        </div>
        @if($note->deleted_at)
            <span class="badge bg-danger">Deleted</span>
        @endif

        <p class="card-text text-muted fs-5">
            {{ $note->description }}
        </p>

        <div class="d-flex flex-wrap gap-2 mt-4">
            <a href="{{ route('notes.show', $note) }}" class="btn btn-outline-primary">
                View
            </a>
            <a href="{{ route('notes.edit', $note) }}" class="btn btn-outline-warning">
                Edit
            </a>

            @if(!$note->deleted_at)

                <form action="{{ route('notes.destroy', $note) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-outline-danger">
                        Delete
                    </button>
                </form>

            @else

                <form action="{{ route('notes.restore', $note) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    <button type="submit" class="btn btn-outline-success">
                        Restore
                    </button>
                </form>

                <form action="{{ route('notes.forceDelete', $note) }}" method="POST">
                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-dark">
                        💥 Delete Forever
                    </button>
                </form>

            @endif
        </div>
    </div>
</div>

@empty

    <div class="alert alert-warning text-center">

        <h4>⚠️ No Notes Found</h4>

        <p class="mb-0">
            Try searching with another keyword.
        </p>

    </div>

@endforelse

<div class="d-flex justify-content-center mt-5">
    {{ $notes->links() }}
</div>

@endsection