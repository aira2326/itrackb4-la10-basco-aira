@extends('layouts.app')

@section('title', 'Movies')

@section('content')

<div class="container mt-4">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-3">

        <h1>Movies</h1>

    </div>


    <!-- Navigation -->
    <div class="mb-3">

        <a href="{{ route('movies.index') }}"
           class="btn btn-secondary">
            All Movies
        </a>

        <a href="{{ route('movies.featured') }}"
           class="btn btn-primary">
            Featured
        </a>

        <a href="{{ route('movies.filter', ['genre' => 'Sci-Fi']) }}"
           class="btn btn-info">
            Sci-Fi
        </a>

        <a href="{{ route('movies.filter', ['genre' => 'Action']) }}"
           class="btn btn-warning">
            Action
        </a>

        <a href="{{ route('movies.filter', ['genre' => 'Crime']) }}"
           class="btn btn-danger">
            Crime
        </a>

    </div>


    <!-- List of Recommendations -->
    <div class="card mb-4">

        <div class="card-header bg-primary text-white">
            List of Recommendations
        </div>

        <div class="card-body">

            <ul class="list-group">

                <li class="list-group-item">
                    <strong>Inception</strong>
                    - Sci-Fi - 2010
                </li>

                <li class="list-group-item">
                    <strong>The Dark Knight</strong>
                    - Action - 2008
                </li>

                <li class="list-group-item">
                    <strong>The Godfather</strong>
                    - Crime - 1972
                </li>

                <li class="list-group-item">
                    <strong>Interstellar</strong>
                    - Sci-Fi - 2014
                </li>

                <li class="list-group-item">
                    <strong>The Matrix</strong>
                    - Sci-Fi - 1999
                </li>

            </ul>

        </div>

    </div>


    <!-- Movies Table -->

    <h2>All Movies</h2>

    <table class="table table-bordered table-striped">

        <thead class="table-dark">

            <tr>

                <th>ID</th>
                <th>Title</th>
                <th>Director</th>
                <th>Genre</th>
                <th>Year</th>
                <th>Action</th>

            </tr>

        </thead>

        <tbody>

            @forelse ($movies as $movie)

                <tr>

                    <td>{{ $movie['id'] }}</td>

                    <td>{{ $movie['title'] }}</td>

                    <td>{{ $movie['director'] }}</td>

                    <td>{{ $movie['genre'] }}</td>

                    <td>{{ $movie['year'] }}</td>

                    <td>

                        <a href="{{ route('movies.show', $movie['id']) }}"
                           class="btn btn-info btn-sm">
                            View
                        </a>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="6"
                        class="text-center">
                        No movies found.
                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>


    <!-- Add Movie -->

    <div class="text-center mt-4">

        <a href="{{ route('movies.create') }}"
           class="btn btn-success btn-lg">
            + Add Movie
        </a>

    </div>


    <!-- Prepared By -->

    <div class="text-center mt-5 mb-3">

        <p class="mb-0">
            Prepared by:
            <strong>Aira Basco</strong>
        </p>

    </div>

</div>

@endsection