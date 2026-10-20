<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $books = Book::all();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:150',
            'author' => 'required|max:100',
            'year' => 'required|numeric|min:1000|max:2026',
            'category' => 'required|in:Fantasy,Classic,Romance',
            'is_featured' => 'required|boolean',
            'description' => 'nullable',
        ]);

        Book::create($validated);
        return redirect()->route('books.index')->with('success', 'Book added!');
    }

    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }

    public function featured()
    {
        $books = Book::where('is_featured', true)->get();
        return view('books.index', compact('books'));
    }
}