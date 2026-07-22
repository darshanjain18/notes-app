@extends('layouts.app')

@section('content')
 <h1>Create a New Note</h1>
 <form action="{{ route('notes.store') }}" method="POST">

    @csrf

    <input
        type="text"
        name="title"
        placeholder="Enter note title">

    <button type="submit">
        Save Note
    </button>

</form>
@endsection