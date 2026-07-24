@extends('layouts.app')

@section('content')
 <h1>Edit Note</h1>
 <form action="{{ route('notes.update', $note->id) }}" method="POST">

    @csrf
    @method('PUT')

    <input
        type="text"
        name="title"
        value="{{ $note->title }}"
        placeholder="Enter note title">
        <br>
        <br>
        <textarea
        name="description"
        placeholder="Enter note description" >{{ $note->description }}</textarea>

    @error('title')
    <p>{{ $message }}</p>
    @enderror

    @error('description')
    <p>{{ $message }}</p>
    @enderror

    <button type="submit">
        Update Note
    </button>

</form>
@endsection