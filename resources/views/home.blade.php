@extends('layouts.app')

@section('content')
    <h1>Welcome to Notes App</h1>

@if(request()->routeIs('home'))
    <p>This is the home page of the Notes App. Here you can manage your notes efficiently.</p>
@endif
@endsection