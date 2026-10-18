<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        // ✅ ID 1 sa itaas, 6 sa ibaba — sunod-sunod
        $movies = Movie::orderBy('id', 'asc')->get();
        return view('movies.index', compact('movies'));
    }

    public function create()
    {
        return view('movies.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'director' => 'required|string|max:255',
            'year' => 'required|integer',
            'is_featured' => 'required|boolean',
            'synopsis' => 'nullable|string',
        ]);

        Movie::create($validated);

        return redirect()->route('movies.index')->with('success', 'Movie added! ID 7 → nasa ibaba');
    }

    public function show($id)
    {
        $movie = Movie::findOrFail($id);
        return view('movies.show', compact('movie'));
    }

    public function featured()
    {
        $movies = Movie::where('is_featured', true)
                       ->orderBy('id', 'asc') // ✅ ganito rin
                       ->get();
        return view('movies.index', compact('movies'));
    }

    public function filter($genre = null)
    {
        $movies = Movie::orderBy('id', 'asc')->get(); // ✅ ganito rin
        return view('movies.index', compact('movies'));
    }
}