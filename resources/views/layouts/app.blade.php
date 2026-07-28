<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Notes App</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
    <div class="container">

        <a class="navbar-brand" href="{{ route('home') }}">
            📝 Notes App
        </a>

        <div class="d-flex gap-3">

            <a class="nav-link text-white" href="{{ route('about') }}">
                @if(request()->routeIs('about'))
                    ⭐ About 
                @else
                    About 
                @endif
            </a>

            <a class="nav-link text-white" href="{{ route('notes.create') }}">
                @if(request()->routeIs('notes.create'))
                    ⭐ Create Note
                @else
                    Create Note
                @endif
            </a>

            <a class="nav-link text-white" href="{{ route('notes.index') }}">
                @if(request()->routeIs('notes.index'))
                    ⭐ All Notes
                @else
                    All Notes
                @endif
            </a>

        </div>

    </div>
</nav>

<hr>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@yield('content')

<hr>

<footer class="bg-dark text-white text-center py-3 mt-5">
    © 2026 Notes App
</footer>

</body>
</html>