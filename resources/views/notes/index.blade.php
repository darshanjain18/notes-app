@extends('layouts.main')

@section('content')

<div class="container py-5">

    {{-- Hero Section --}}
    <div class="text-center bg-light rounded-4 shadow-sm p-5 mb-5">

        <h1 class="display-4 fw-bold">
            📝 Notes App
        </h1>

        <p class="lead text-muted mb-4">
            Organize your ideas, manage your notes and stay productive.
        </p>

    </div>


    {{-- Search --}}
    <form action="{{ route('notes.index') }}" method="GET" class="mb-5">

        <div class="input-group input-group-lg">

            <input
                type="text"
                name="search"
                class="form-control"
                placeholder="🔍 Search by title or description..."
                value="{{ request('search') }}">

            <button class="btn btn-primary px-4">
                Search
            </button>

        </div>

    </form>


    {{-- Notes --}}
    @forelse($notes as $note)

        <div class="card border-0 shadow-sm rounded-4 mb-4">

            <div class="card-body p-4">

                {{-- Title --}}
                <h3 class="fw-bold mb-3">
                    📝 {{ $note->title }}
                </h3>

                {{-- Metadata --}}
                <div class="d-flex flex-wrap align-items-center gap-2 text-muted small mb-3">

                    <span class="badge bg-primary">
                        👤 {{ $note->user->name }}
                    </span>

                    <span class="badge bg-secondary">
                        📄 {{ $note->user->notes_count }} Notes
                    </span>

                    <span>
                        📅 {{ $note->created_at }}
                    </span>

                    @if($note->deleted_at)
                        <span class="badge bg-danger">
                            🗑 Deleted
                        </span>
                    @else
                        <span class="badge bg-success">
                            ✅ Active
                        </span>
                    @endif

                </div>

                {{-- Description --}}
                <p class="text-secondary fs-5">
                    {{ Str::words($note->description, 25, '...') }}
                </p>

                <hr>

                {{-- Buttons --}}
                <div class="d-flex flex-wrap gap-2">

                    <a href="{{ route('notes.show', $note) }}"
                       class="btn btn-outline-primary btn-sm">
                        👁 View
                    </a>

                    @if(!$note->deleted_at)

                        <a href="{{ route('notes.edit', $note) }}"
                           class="btn btn-outline-warning btn-sm">
                            ✏ Edit
                        </a>

                        <form action="{{ route('notes.destroy', $note) }}" method="POST">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-outline-danger btn-sm">
                                🗑 Delete
                            </button>

                        </form>

                    @else

                        <form action="{{ route('notes.restore', $note->id) }}" method="POST">

                            @csrf
                            @method('PATCH')

                            <button class="btn btn-outline-success btn-sm">
                                ♻ Restore
                            </button>

                        </form>

                        <form action="{{ route('notes.forceDelete', $note->id) }}" method="POST">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm">
                                💥 Delete Forever
                            </button>

                        </form>

                    @endif

                </div>

            </div>

        </div>

    @empty

        <div class="alert alert-warning text-center shadow-sm">

            <h4>⚠️ No Notes Found</h4>

            <p class="mb-0">
                Try another search keyword or create a new note.
            </p>

            <a href="{{ route('notes.create') }}"
               class="btn btn-primary mt-3">
                ➕ Create First Note
            </a>

        </div>

    @endforelse


    {{-- Pagination --}}
    <div class="d-flex justify-content-center mt-5">
        {{ $notes->links() }}
    </div>

</div>

@endsection