<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventoImagen extends Model
{
    protected $table = 'evento_imagenes';

    protected $fillable = [
        'evento_id',
        'image_path',
    ];

    public function evento()
    {
        return $this->belongsTo(Evento::class);
    }
}
