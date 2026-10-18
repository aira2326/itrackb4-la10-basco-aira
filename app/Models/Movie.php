<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'director',
        'year',
        'is_featured',
        'synopsis',
    ];

    protected function casts(): array
    {
        return [
            'is_featured' => 'boolean',
            'year' => 'integer',
        ];
    }
}