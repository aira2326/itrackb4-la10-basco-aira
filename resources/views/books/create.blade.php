@extends('layouts.app')

@section('title', 'Add New Book')

@section('content')
<h1 class="mb-4">Add New Book</h1>

<form action="{{ route('books.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label class="form-label">Title</label>
        <input type="text" name="title" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Author</label>
        <input type="text" name="author" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Year</label>
        <input type="number" name="year" class="form-control" required>
    </div>

    <div class="mb-3">
        <label class="form-label">Category</label>
        <select name="category" class="form-select" required>
            <option value="">-- Select Category --</option>
            <option value="Fantasy">Fantasy</option>
            <option value="Classic">Classic</option>
            <option value="Romance">Romance</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Featured</label>
        <select name="is_featured" class="form-select" required>
            <option value="1">Yes</option>
            <option value="0">No</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control" rows="3"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Save Book</button>
    <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection