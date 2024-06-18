<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Box Movies</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="{{ route('home') }}">Box Movies</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item {{ Request::routeIs('home') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item {{ Request::routeIs('developer') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('developer') }}">Developer Profile</a>
                </li>
                @auth
                    <li class="nav-item {{ Request::routeIs('movies.index') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('movies.index') }}">Movies</a>
                    </li>
                    <li class="nav-item {{ Request::routeIs('movies.create') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('movies.create') }}">Add Movies</a>
                    </li>
                    <li class="nav-item {{ Request::routeIs('genres.create') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('genres.create') }}">Add Genres</a>
                    </li>
                @endauth
            </ul>
            <ul class="navbar-nav ml-auto">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-user"></i> Hello, {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="#" onclick="confirmLogout(event)">
                                    <i class="fa fa-sign-out-alt"></i> LOGOUT
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item {{ Request::routeIs('login') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('login') }}"><i class="fa fa-sign-in-alt"></i> LOGIN</a>
                    </li>
                @endauth
            </ul>
        </div>
    </nav>
    <div class="container mt-4">
        @yield('content')
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function confirmLogout(event) {
            event.preventDefault();
            if (confirm('Are You Sure You Want to Logout?')) {
                document.getElementById('logout-form').submit();
            }
        }

        $(document).ready(function() {
            setTimeout(function() {
                $(".alert").alert('close');
            }, 4000);
        });
    </script>
</body>
</html>