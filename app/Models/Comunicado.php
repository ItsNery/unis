<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comunicado extends Model
{
    protected $table = 'comunicados';

    /** @use HasFactory<\Database\Factories\ComunicadoFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'summary',
        'file_path',
        'image_path',
        'published_at',
        'is_active',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'is_active' => 'boolean',
    ];
}
