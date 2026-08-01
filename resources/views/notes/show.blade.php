@extends('layouts.app')

@section('content')

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header">
            <h2 class="mb-0">📒 Note Details</h2>
        </div>

        <div class="card-body">

            <div class="mb-3">
                <strong>Title:</strong>
                <p class="mb-0">{{ $note->title }}</p>
            </div>

            <div class="mb-3">
                <strong>Description:</strong>
                <p class="mb-0">{{ $note->description }}</p>
            </div>

            <div class="mb-3">
                <strong>Author:</strong>
                <p class="mb-0">{{ $note->user->name }}</p>
            </div>

            <div class="mb-3">
                <strong>Created At:</strong>
                <p class="mb-0">{{ $note->created_at }}</p>
            </div>

            <div class="mb-4">
                <strong>Status:</strong>

                @if($note->deleted_at)
                    <span class="badge bg-danger">Deleted</span>
                @else
                    <span class="badge bg-success">Active</span>
                @endif
            </div>

            <div class="d-flex gap-2">

                <a href="{{ route('notes.index') }}" class="btn btn-secondary">
                    ← Back
                </a>

                <a href="{{ route('notes.edit', $note) }}" class="btn btn-warning">
                    ✏ Edit
                </a>

                @if(!$note->deleted_at)

                    <form action="{{ route('notes.destroy', $note) }}" method="POST">

                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger">
                            🗑 Delete
                        </button>

                    </form>

                @else

                    <form action="{{ route('notes.restore', $note->id) }}" method="POST">

                        @csrf
                        @method('PATCH')

                        <button class="btn btn-success">
                            ♻ Restore
                        </button>

                    </form>

                @endif

            </div>

        </div>

    </div>

</div>

@endsection