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
</nav>

<hr>

@yield('content')

<hr>

<footer>
    Notes App © 2026
</footer>

</body>
</html>