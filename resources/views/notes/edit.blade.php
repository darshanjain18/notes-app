@extends('layouts.main')

@section('content')

<div class="container mt-5">

    <div class="card shadow">

        <div class="card-header">
            <h2 class="mb-0">✏ Edit Note</h2>
        </div>

        <div class="card-body">

            <form action="{{ route('notes.update', $note) }}" method="POST" enctype="multipart/form-data">

                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Title</label>

                    <input
                        type="text"
                        name="title"
                        class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title', $note->title) }}"
                        placeholder="Enter note title">

                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Description</label>

                    <textarea
                        name="description"
                        rows="5"
                        class="form-control @error('description') is-invalid @enderror"
                        placeholder="Enter note description">{{ old('description', $note->description) }}</textarea>

                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">

                    <label class="form-label fw-bold">
                        Current Attachment
                    </label>

                    @if($note->attachment)

                        @php
                            $extension = pathinfo($note->attachment, PATHINFO_EXTENSION);
                        @endphp

                        @if(in_array($extension, ['jpg', 'jpeg', 'png']))

                            <div class="mb-3">
                                <img src="{{ asset('storage/' . $note->attachment) }}"
                                    class="img-fluid rounded shadow"
                                    style="max-width:250px;">
                            </div>

                        @else

                            <div class="mb-3">
                                <a href="{{ asset('storage/' . $note->attachment) }}"
                                target="_blank"
                                class="btn btn-outline-primary">
                                    📄 View Current File
                                </a>
                            </div>

                        @endif

                        <div class="form-check mb-3">

                            <input
                                class="form-check-input"
                                type="checkbox"
                                name="remove_attachment"
                                value="1"
                                id="removeAttachment">

                            <label class="form-check-label" for="removeAttachment">
                                Remove current attachment
                            </label>

                        </div>

                    @else

                        <p class="text-muted">
                            No attachment uploaded.
                        </p>

                    @endif

                    <label class="form-label fw-bold">
                        Upload New Attachment
                    </label>

                    <input
                        type="file"
                        name="attachment"
                        class="form-control @error('attachment') is-invalid @enderror">

                    <div class="form-text">
                        Leave empty to keep the current attachment.
                    </div>

                    @error('attachment')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="d-flex gap-2">

                    <a href="{{ route('notes.index') }}" class="btn btn-secondary">
                        Cancel
                    </a>

                    <button type="submit" class="btn btn-primary">
                        Update Note
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>

@endsection