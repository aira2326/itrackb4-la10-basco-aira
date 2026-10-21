<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\Genre;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    public function run(): void
    {
        // Mga Genre — Unang gawin
        $sciFi  = Genre::create(['name' => 'Sci-Fi']);
        $action = Genre::create(['name' => 'Action']);
        $crime  = Genre::create(['name' => 'Crime']);

        // Pelikula 1
        Movie::create([
            'title'       => 'Inception',
            'director'    => 'Christopher Nolan',
            'year'        => 2010,
            'is_featured' => true,
            'genre_id'    => $sciFi->id,
            'description' => 'A thief who steals corporate secrets through dream-sharing technology.',
        ]);

        // Pelikula 2
        Movie::create([
            'title'       => 'The Dark Knight',
            'director'    => 'Christopher Nolan',
            'year'        => 2008,
            'is_featured' => true,
            'genre_id'    => $action->id,
            'description' => 'When the menace known as the Joker wreaks havoc on Gotham.',
        ]);

        // Pelikula 3
        Movie::create([
            'title'       => 'Interstellar',
            'director'    => 'Christopher Nolan',
            'year'        => 2014,
            'is_featured' => true,
            'genre_id'    => $sciFi->id,
            'description' => 'A team travels through a wormhole in space to ensure humanity\'s survival.',
        ]);

        // Pelikula 4
        Movie::create([
            'title'       => 'The Matrix',
            'director'    => 'The Wachowskis',
            'year'        => 1999,
            'is_featured' => false,
            'genre_id'    => $sciFi->id,
            'description' => null,
        ]);

        // Pelikula 5
        Movie::create([
            'title'       => 'The Godfather',
            'director'    => 'Francis Ford Coppola',
            'year'        => 1972,
            'is_featured' => false,
            'genre_id'    => $crime->id,
            'description' => 'The aging patriarch of an organized crime dynasty transfers control.',
        ]);

        // Pelikula 6
        Movie::create([
            'title'       => 'Avengers: Endgame',
            'director'    => 'Anthony Russo and Joe Russo',
            'year'        => 2019,
            'is_featured' => true,
            'genre_id'    => $action->id,
            'description' => null,
        ]);

        // ✅ Pelikula 7 — The Expandables
        Movie::create([
            'title'       => 'The Expandables',
            'director'    => 'Michael Bay',
            'year'        => 2010,
            'is_featured' => true,
            'genre_id'    => $action->id,
            'description' => 'A team of elite mercenaries takes on a dangerous mission.',
        ]);
    }
}