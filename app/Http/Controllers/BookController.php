<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    private function getBooks()
    {
        $path = storage_path('app/books.json');

        if (!file_exists($path)) {
            return [];
        }

        return json_decode(
            file_get_contents($path),
            true
        ) ?? [];
    }

    private function saveBooks($books)
    {
        $path = storage_path('app/books.json');

        file_put_contents(
            $path,
            json_encode($books, JSON_PRETTY_PRINT)
        );
    }

    public function index(Request $request)
    {
        $category = $request->query('category', '');
        $author = $request->query('author', '');

        $books = $this->getBooks();

        $filteredBooks = [];

        foreach ($books as $book) {

            $categoryMatch = true;
            $authorMatch = true;

            if ($category !== '') {
                $categoryMatch =
                    strcasecmp($book['category'], $category) === 0;
            }

            if ($author !== '') {
                $authorMatch =
                    strcasecmp($book['author'], $author) === 0;
            }

            if ($categoryMatch && $authorMatch) {
                $filteredBooks[] = $book;
            }
        }

        return view('books.index', [
            'books' => $filteredBooks,
            'category' => $category,
            'author' => $author
        ]);
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
        ]);

        $books = $this->getBooks();

        $newId = empty($books)
            ? 1
            : max(array_column($books, 'id')) + 1;

        $books[$newId] = [
            'id' => $newId,
            'title' => $validated['title'],
            'author' => $validated['author'],
            'year' => $validated['year'],
            'category' => $validated['category'],
        ];

        $this->saveBooks($books);

        return redirect()
            ->route('books.index')
            ->with('success', 'Book added successfully!');
    }

    public function show($id)
    {
        $books = $this->getBooks();

        $book = collect($books)->firstWhere('id', $id);

        abort_if(!$book, 404);

        return view('books.show', compact('book'));
    }

    public function featured()
    {
        $books = $this->getBooks();

        $featured = array_filter($books, function ($book) {
            return $book['category'] === 'Fantasy';
        });

        return view('books.featured', [
            'books' => $featured
        ]);
    }
}