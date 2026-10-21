<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        // I-enable ang query log para makita ang bilang
        DB::enableQueryLog();

        $genreId = $request->query('genre_id');

        $query = Movie::query();

        if ($genreId) {
            $query->where('genre_id', $genreId);
        }

        // with() = eager loading → 2 queries para sa movies + genres
        $movies = $query->with('genre')->get();

        // Dagdag na query para sa dropdown/buttons → kabuuan 3
        $genres = Genre::all();

        return view('movies.index', compact('movies', 'genres'));
    }

    // ✅ Ito ang nawawala — create() method
    public function create()
    {
        $genres = Genre::all();
        return view('movies.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'director'    => 'required|string|max:255',
            'year'        => 'required|integer|min:1888|max:2100',
            'is_featured' => 'required|boolean',
            'genre_id'    => 'required|exists:genres,id',
            'description' => 'nullable|string|max:1000',
        ]);

        Movie::create($validated);

        return redirect()->route('movies.index');
    }

    public function show($id)
    {
        $movie = Movie::findOrFail($id);
        return view('movies.show', compact('movie'));
    }
}