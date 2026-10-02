@extends('layouts.app')

@section('title', $book['title'])

@section('content')

<div class="container mt-4">

    <h1>{{ $book['title'] }}</h1>

    <table class="table table-bordered">

        <tr>
            <th>ID</th>
            <td>{{ $book['id'] }}</td>
        </tr>

        <tr>
            <th>Title</th>
            <td>{{ $book['title'] }}</td>
        </tr>

        <tr>
            <th>Author</th>
            <td>{{ $book['author'] }}</td>
        </tr>

        <tr>
            <th>Year</th>
            <td>{{ $book['year'] }}</td>
        </tr>

        <tr>
            <th>Category</th>
            <td>{{ $book['category'] }}</td>
        </tr>

    </table>

    <a href="{{ route('books.index') }}"
       class="btn btn-secondary">
        Back to Books
    </a>

</div>

@endsection