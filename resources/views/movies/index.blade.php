@extends('layouts.app')

@section('title', 'Movies')

@section('content')

<div class="container mt-4">

    <h1>Movies</h1>

    <div class="mb-3">

        <a href="{{ route('movies.index') }}"
           class="btn btn-secondary">
            All Movies
        </a>

        <a href="{{ route('movies.featured') }}"
           class="btn btn-primary">
            Featured
        </a>

        <a href="{{ route('movies.index', ['genre' => 'Sci-Fi']) }}"
           class="btn btn-info">
            Sci-Fi
        </a>

        <a href="{{ route('movies.index', ['genre' => 'Action']) }}"
           class="btn btn-warning">
            Action
        </a>

        <a href="{{ route('movies.index', ['genre' => 'Crime']) }}"
           class="btn btn-danger">
            Crime
        </a>

    </div>


    <div class="card mb-4">

        <div class="card-header">
            Filter Movies
        </div>

        <div class="card-body">

            <form method="GET"
                  action="{{ route('movies.index') }}">

                <div class="row">

                    <div class="col-md-5">

                        <label class="form-label">
                            Genre
                        </label>

                        <select name="genre"
                                class="form-select">

                            <option value="">
                                All Genres
                            </option>

                            <option value="Sci-Fi"
                                @selected($genre == 'Sci-Fi')>
                                Sci-Fi
                            </option>

                            <option value="Action"
                                @selected($genre == 'Action')>
                                Action
                            </option>

                            <option value="Crime"
                                @selected($genre == 'Crime')>
                                Crime
                            </option>

                        </select>

                    </div>


                    <div class="col-md-5">

                        <label class="form-label">
                            Search
                        </label>

                        <input
                            type="text"
                            name="search"
                            value="{{ $search }}"
                            class="form-control"
                            placeholder="Search movie..."
                        >

                    </div>


                    <div class="col-md-2 d-flex align-items-end">

                        <button
                            type="submit"
                            class="btn btn-primary w-100">
                            Filter
                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>


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

                        <a
                            href="{{ route('movies.show', $movie['id']) }}"
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


    <div class="text-center mt-4">

        <a
            href="{{ route('movies.create') }}"
            class="btn btn-success btn-lg">
            + Add Movie
        </a>

    </div>


    <div class="text-center mt-5 mb-3">

        <p>
            Prepared by:
            <strong>Edshieline kaye</strong>
        </p>

    </div>

</div>

@endsection