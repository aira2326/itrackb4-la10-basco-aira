<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'year',
        'category',
        'is_featured',
        'description',
    ];

    protected function casts(): array
    {
        return [
            'is_featured' => 'boolean',
            'year'        => 'integer',
        ];
    }
}