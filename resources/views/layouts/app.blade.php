<!DOCTYPE html>
<html>
<head>
    <title>Notes App</title>
</head>
<body>

<nav>
    <a href="{{ route('home') }}">
        @if(request()->routeIs('home'))
            ⭐ Home
        @else
            Home
        @endif
    </a>

    |

    <a href="{{ route('about') }}">
        @if(request()->routeIs('about'))
            ⭐ About
        @else
            About
        @endif
    </a>
    
    |
    
    <a href="{{ route('notes.create') }}">
        @if(request()->routeIs('notes.create'))
            ⭐ Create Note
        @else
            Create Note
        @endif
    </a>

    |

    <a href="{{ route('notes.index') }}">
        @if(request()->routeIs('notes.index'))
            ⭐ All Notes
        @else
            All Notes
        @endif
    </a>
</nav>

<hr>

@if(session('success'))
    <div style="background:#d4edda; color:#155724; padding:10px; margin-bottom:15px; border-radius:5px;">
        {{ session('success') }}
    </div>
@endif

@yield('content')

<hr>

<footer>
    Notes App © 2026
</footer>

</body>
</html>