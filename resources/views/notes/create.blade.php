@extends('layouts.app')

@section('content')

<div class="container mt-4">

    <div class="card shadow">

        <div class="card-header">
            <h2 class="mb-0">📝 Create a New Note</h2>
        </div>

        <div class="card-body">

            <form action="{{ route('notes.store') }}" method="POST">

                @csrf

                <div class="mb-3">
                    <label class="form-label">Title</label>

                    <input
                        type="text"
                        name="title"
                        class="form-control"
                        placeholder="Enter note title"
                        value="{{ old('title') }}"
                    >

                    @error('title')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">

                    <label class="form-label">Description</label>

                    <textarea
                        name="description"
                        class="form-control"
                        rows="5"
                        placeholder="Enter note description">{{ old('description') }}</textarea>

                    @error('description')
                        <div class="text-danger mt-1">{{ $message }}</div>
                    @enderror

                </div>

                <button class="btn btn-success">
                    💾 Save Note
                </button>

            </form>

        </div>

    </div>

</div>

@endsection