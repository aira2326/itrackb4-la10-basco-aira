<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Add New Movie</title>
</head>
<body>
    <h1>Add New Movie</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="{{ url('/movies') }}" method="POST">
        @csrf

        <p>
            <label>Title:</label><br>
            <input type="text" name="title" required>
        </p>

        <p>
            <label>Director:</label><br>
            <input type="text" name="director" required>
        </p>

        <p>
            <label>Year:</label><br>
            <input type="number" name="year" required>
        </p>

        <p>
            <label>Featured:</label>
            <input type="checkbox" name="is_featured" value="1">
        </p>

        <p>
            <label>Synopsis:</label><br>
            <textarea name="synopsis" rows="4" cols="50"></textarea>
        </p>

        <p>
            <button type="submit">Save Movie</button>
        </p>
    </form>

    <p>
        <a href="{{ url('/movies') }}">← Back to List</a>
    </p>
</body>
</html>