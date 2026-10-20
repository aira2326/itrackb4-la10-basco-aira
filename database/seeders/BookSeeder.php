<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        Book::create([
            'title'       => 'Harry Potter and the Philosopher\'s Stone',
            'author'      => 'J.K. Rowling',
            'year'        => 1997,
            'category'    => 'Fantasy',
            'is_featured' => true,
            'description' => 'The first book in the beloved fantasy series.',
        ]);

        Book::create([
            'title'       => 'The Great Gatsby',
            'author'      => 'F. Scott Fitzgerald',
            'year'        => 1925,
            'category'    => 'Classic',
            'is_featured' => true,
            'description' => 'A story of the mysteriously wealthy Jay Gatsby.',
        ]);

        Book::create([
            'title'       => 'Pride and Prejudice',
            'author'      => 'Jane Austen',
            'year'        => 1813,
            'category'    => 'Romance',
            'is_featured' => true,
            'description' => 'A romantic novel following Elizabeth Bennet.',
        ]);

        Book::create([
            'title'       => 'The Hobbit',
            'author'      => 'J.R.R. Tolkien',
            'year'        => 1937,
            'category'    => 'Fantasy',
            'is_featured' => false,
            'description' => 'A fantasy adventure about Bilbo Baggins.',
        ]);

        // ✅ Inayos na: Hakdog / Amor Tonio / 1982
        Book::create([
            'title'       => 'Hakdog',
            'author'      => 'Amor Tonio',
            'year'        => 1982,
            'category'    => 'Classic',
            'is_featured' => true,
            'description' => 'Special book by Amor Tonio.',
        ]);
    }
}