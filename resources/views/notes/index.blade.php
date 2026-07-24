@extends('layouts.app')

@section('content')
<h1>All Notes</h1>

@foreach($notes as $note)

    <h3>{{ $note->title }}</h3>

    <p>{{ $note->description }}</p>
    <a href="{{ route('notes.edit', $note->id) }}">Edit</a>

    <hr>
    
    <form action="{{ route('notes.destroy', $note->id) }}" method="POST">

    @csrf
    @method('DELETE')

    <button type="submit">
        Delete
    </button>

</form>

@endforeach

@endsection