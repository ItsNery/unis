<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pronunciamiento extends Model
{
    protected $table = 'pronunciamientos';

    /** @use HasFactory<\Database\Factories\PronunciamientoFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'author_name',
        'author_title',
        'author_image',
        'excerpt',
        'content',
        'is_active',
        'published_at',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'published_at' => 'datetime',
    ];
}
