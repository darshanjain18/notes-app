@extends('layouts.app')

@section('content')
<h1>All Notes</h1>
@foreach($notes as $note)

    <h3>{{ $note->title }}</h3>

    <p>{{ $note->description }}</p>
    <a href="{{ route('notes.edit', $note->id) }}">Edit</a>

    <hr>

@endforeach
@endsection