@extends('layouts.app')

@section('content')

<h1>Create a New Note</h1>

<form action="{{ route('notes.store') }}" method="POST">

    @csrf

    <div class="mb-3">
        <input
            type="text"
            name="title"
            class="form-control"
            placeholder="Enter note title"
            value="{{ old('title') }}">
    </div>

    @error('title')
        <p class="text-danger">{{ $message }}</p>
    @enderror

    <div class="mb-3">
        <textarea
            name="description"
            class="form-control"
            rows="5"
            placeholder="Enter note description">{{ old('description') }}</textarea>
    </div>

    @error('description')
        <p class="text-danger">{{ $message }}</p>
    @enderror

    <button type="submit" class="btn btn-success">
        Save Note
    </button>

</form>

@endsection