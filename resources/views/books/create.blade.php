@extends('layouts.app')

@section('title', 'Add Book')

@section('content')

<div class="container mt-4">

    <h1>Add Book</h1>

    <form action="{{ route('books.store') }}" method="POST">

        @csrf

        <!-- Title -->
        <div class="mb-3">

            <label for="title" class="form-label">
                Title
            </label>

            <input
                type="text"
                name="title"
                id="title"
                value="{{ old('title') }}"
                class="form-control @error('title') is-invalid @enderror"
            >

            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>


        <!-- Author -->
        <div class="mb-3">

            <label for="author" class="form-label">
                Author
            </label>

            <input
                type="text"
                name="author"
                id="author"
                value="{{ old('author') }}"
                class="form-control @error('author') is-invalid @enderror"
            >

            @error('author')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>


        <!-- Year -->
        <div class="mb-3">

            <label for="year" class="form-label">
                Year
            </label>

            <input
                type="number"
                name="year"
                id="year"
                value="{{ old('year') }}"
                class="form-control @error('year') is-invalid @enderror"
            >

            @error('year')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>


        <!-- Category -->
        <div class="mb-3">

            <label for="category" class="form-label">
                Category
            </label>

            <select
                name="category"
                id="category"
                class="form-select @error('category') is-invalid @enderror"
            >

                <option value="">
                    Select Category
                </option>

                <option value="Fantasy"
                    @selected(old('category') == 'Fantasy')>
                    Fantasy
                </option>

                <option value="Classic"
                    @selected(old('category') == 'Classic')>
                    Classic
                </option>

                <option value="Romance"
                    @selected(old('category') == 'Romance')>
                    Romance
                </option>

            </select>

            @error('category')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>


        <!-- Buttons -->
        <div class="mb-4">

            <button type="submit" class="btn btn-success">
                + Add Book
            </button>

            <a href="{{ route('books.index') }}"
               class="btn btn-secondary">
                Cancel
            </a>

        </div>

    </form>


    <!-- Prepared By -->

    <div class="text-center mt-5 mb-3">

        <p>
            Prepared by:
            <strong>Amor Tonio</strong>
        </p>

    </div>

</div>

@endsection