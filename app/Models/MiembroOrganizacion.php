<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MiembroOrganizacion extends Model
{
    protected $table = 'miembros_organizacion';

    protected $fillable = [
        'name',
        'title',
        'area',
        'phone',
        'description',
        'phrase',
        'image_path',
        'is_titular',
        'order'
    ];
}
