<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denuncia extends Model
{
    protected $table = 'denuncias';

    /** @use HasFactory<\Database\Factories\DenunciaFactory> */
    use HasFactory;

    protected $fillable = [
        'ticket_number',
        'subject',
        'description',
        'is_anonymous',
        'complainant_name',
        'complainant_email',
        'complainant_phone',
        'status',
        'internal_notes',
    ];

    protected $casts = [
        'is_anonymous' => 'boolean',
    ];
}
