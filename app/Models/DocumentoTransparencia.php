<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentoTransparencia extends Model
{
    protected $table = 'documentos_transparencia';

    /** @use HasFactory<\Database\Factories\DocumentoTransparenciaFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'category',
        'file_path',
        'description',
        'published_at',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'published_at' => 'datetime',
    ];
}
