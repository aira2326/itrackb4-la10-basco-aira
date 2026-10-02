@extends('layouts.app')

@section('title', 'Books')

@section('content')

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-3">

        <h1>Books</h1>

    </div>


    <!-- Navigation -->

    <div class="mb-3">

        <a href="{{ route('books.index') }}"
           class="btn btn-secondary">
            All Books
        </a>

        <a href="{{ route('books.featured') }}"
           class="btn btn-primary">
            Featured
        </a>

        <a href="{{ route('books.index', ['category' => 'Fantasy']) }}"
           class="btn btn-info">
            Fantasy
        </a>

        <a href="{{ route('books.index', ['category' => 'Classic']) }}"
           class="btn btn-warning">
            Classic
        </a>

        <a href="{{ route('books.index', ['category' => 'Romance']) }}"
           class="btn btn-danger">
            Romance
        </a>

    </div>


    <!-- Filters -->

    <div class="card mb-4">

        <div class="card-header">
            Filter Books
        </div>

        <div class="card-body">

            <form method="GET"
                  action="{{ route('books.index') }}">

                <div class="row">

                    <div class="col-md-5">

                        <label class="form-label">
                            Category
                        </label>

                        <select
                            name="category"
                            class="form-select"
                        >

                            <option value="">
                                All Categories
                            </option>

                            <option value="Fantasy"
                                @selected($category == 'Fantasy')>
                                Fantasy
                            </option>

                            <option value="Classic"
                                @selected($category == 'Classic')>
                                Classic
                            </option>

                            <option value="Romance"
                                @selected($category == 'Romance')>
                                Romance
                            </option>

                        </select>

                    </div>


                    <div class="col-md-5">

                        <label class="form-label">
                            Author
                        </label>

                        <select
                            name="author"
                            class="form-select"
                        >

                            <option value="">
                                All Authors
                            </option>

                            <option value="J.K. Rowling"
                                @selected($author == 'J.K. Rowling')>
                                J.K. Rowling
                            </option>

                            <option value="J.R.R. Tolkien"
                                @selected($author == 'J.R.R. Tolkien')>
                                J.R.R. Tolkien
                            </option>

                            <option value="C.S. Lewis"
                                @selected($author == 'C.S. Lewis')>
                                C.S. Lewis
                            </option>

                            <option value="Jane Austen"
                                @selected($author == 'Jane Austen')>
                                Jane Austen
                            </option>

                        </select>

                    </div>


                    <div class="col-md-2 d-flex align-items-end">

                        <button type="submit"
                                class="btn btn-primary w-100">
                            Filter
                        </button>

                    </div>

                </div>

            </form>

        </div>

    </div>


    <!-- Books Table -->

    <h2>All Books</h2>

    <table class="table table-bordered table-striped">

        <thead class="table-dark">

            <tr>

                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Year</th>
                <th>Category</th>
                <th>Action</th>

            </tr>

        </thead>

        <tbody>

            @forelse ($books as $book)

                <tr>

                    <td>{{ $book['id'] }}</td>

                    <td>{{ $book['title'] }}</td>

                    <td>{{ $book['author'] }}</td>

                    <td>{{ $book['year'] }}</td>

                    <td>{{ $book['category'] }}</td>

                    <td>

                        <a href="{{ route('books.show', $book['id']) }}"
                           class="btn btn-info btn-sm">
                            View
                        </a>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="6"
                        class="text-center">
                        No books found.
                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>


    <!-- Add Book -->

    <div class="text-center mt-4">

        <a href="{{ route('books.create') }}"
           class="btn btn-success btn-lg">
            + Add Book
        </a>

    </div>


    <!-- Prepared By -->

    <div class="text-center mt-5 mb-3">

        <p>
            Prepared by:
            <strong>Amor Tonio</strong>
        </p>

    </div>

</div>

@endsection