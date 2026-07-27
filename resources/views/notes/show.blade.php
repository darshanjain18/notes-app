@extends('layouts.app')
@section('content')
<h1>Single Note</h1>
<h2>{{ $note->title }}</h2>
<p>{{ $note->description }}</p>
@endsection