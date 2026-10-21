<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $movie->title }}</title>
    <style>
        body { font-family: sans-serif; max-width: 600px; margin: 2rem auto; padding: 0 1rem; }
        dt { font-weight: bold; margin-top: 1rem; }
    </style>
</head>
<body>

<h1>{{ $movie->title }}</h1>

<dl>
    <dt>Director</dt>
    <dd>{{ $movie->director }}</dd>

    <dt>Year</dt>
    <dd>{{ $movie->year }}</dd>

    <dt>Genre</dt>
    <dd>{{ $movie->genre->name }}</dd>

    <dt>Featured</dt>
    <dd>{{ $movie->is_featured ? 'Yes' : 'No' }}</dd>

    <dt>Description</dt>
    <dd>{{ $movie->description ?? 'No description provided.' }}</dd>
</dl>

<p><a href="{{ route('movies.index') }}">← Back to List</a></p>

</body>
</html>