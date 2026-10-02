<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title', 'Movie App')
    </title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <div class="container">

            <a class="navbar-brand"
               href="{{ route('movies.index') }}">
                Movie App
            </a>

            <div class="navbar-nav">

                <a class="nav-link"
                   href="{{ route('movies.index') }}">
                    All Movies
                </a>

                <a class="nav-link"
                   href="{{ route('movies.featured') }}">
                    Featured
                </a>

                <a class="nav-link"
                   href="{{ route('movies.index', ['genre' => 'Sci-Fi']) }}">
                    Sci-Fi
                </a>

                <a class="nav-link"
                   href="{{ route('movies.index', ['genre' => 'Action']) }}">
                    Action
                </a>

                <a class="nav-link"
                   href="{{ route('movies.index', ['genre' => 'Crime']) }}">
                    Crime
                </a>

                <a class="nav-link"
                   href="{{ route('movies.create') }}">
                    + Add Movie
                </a>

            </div>

        </div>

    </nav>


    @if (session('success'))

        <div class="container mt-3">

            <div class="alert alert-success">
                {{ session('success') }}
            </div>

        </div>

    @endif


    @yield('content')

</body>

</html>