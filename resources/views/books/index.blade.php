@extends('layouts.app')

@section('title', 'Books')

@section('content')
<h1 class="mb-4">Books</h1>

{{-- Category Buttons --}}
<div class="mb-4">
    <a href="{{ route('books.index') }}" class="btn btn-secondary">All Books</a>
    <a href="{{ route('books.featured') }}" class="btn btn-primary">Featured</a>
    <a href="{{ route('books.category', 'Fantasy') }}" class="btn btn-info text-white">Fantasy</a>
    <a href="{{ route('books.category', 'Classic') }}" class="btn btn-warning">Classic</a>
    <a href="{{ route('books.category', 'Romance') }}" class="btn btn-danger text-white">Romance</a>
</div>

{{-- Filter Form --}}
<div class="card mb-4">
    <div class="card-body">
        <h5 class="card-title">Filter Books</h5>
        <form action="{{ route('books.index') }}" method="GET" class="row g-3">
            <div class="col-md-5">
                <label class="form-label">Category</label>
                <select name="category" class="form-select">
                    <option value="">All Categories</option>
                    <option value="Fantasy" {{ request('category') == 'Fantasy' ? 'selected' : '' }}>Fantasy</option>
                    <option value="Classic" {{ request('category') == 'Classic' ? 'selected' : '' }}>Classic</option>
                    <option value="Romance" {{ request('category') == 'Romance' ? 'selected' : '' }}>Romance</option>
                </select>
            </div>
            <div class="col-md-5">
                <label class="form-label">Author</label>
                <select name="author" class="form-select">
                    <option value="">All Authors</option>
                    @if(isset($uniqueAuthors))
                        @foreach($uniqueAuthors as $auth)
                        <option value="{{ $auth }}" {{ request('author') == $auth ? 'selected' : '' }}>{{ $auth }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="col-md-2 align-self-end">
                <button type="submit" class="btn btn-primary w-100">Filter</button>
            </div>
        </form>
    </div>
</div>

{{-- Book Table --}}
<h3 class="mb-3">All Books</h3>

@if($books->isEmpty())
    <div class="alert alert-warning">
        No books found. Please add a new book.
    </div>
@else
    <table class="table table-striped table-bordered">
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
            @foreach($books as $book)
            <tr>
                <td>{{ $book->id }}</td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->author }}</td>
                <td>{{ $book->year }}</td>
                <td>{{ $book->category }}</td>
                <td>
                    <a href="{{ route('books.show', $book->id) }}" class="btn btn-sm btn-info">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif

<div class="text-center my-4">
    <a href="{{ route('books.create') }}" class="btn btn-success">+ Add Book</a>
</div>

<p class="text-center mt-5">Prepared by: Amor Tonio</p>
@endsection