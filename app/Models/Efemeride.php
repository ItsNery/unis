<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Efemeride extends Model
{
    use HasFactory;

    protected $fillable = [
        'day',
        'month',
        'title',
        'description',
        'color',
        'is_active',
        'order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    public static function getSortedChronologically($query)
    {
        return $query->get()->sortBy(function($efemeride) {
            $months = [
                'Enero' => 1, 'Febrero' => 2, 'Marzo' => 3, 'Abril' => 4,
                'Mayo' => 5, 'Junio' => 6, 'Julio' => 7, 'Agosto' => 8,
                'Septiembre' => 9, 'Octubre' => 10, 'Noviembre' => 11, 'Diciembre' => 12
            ];
            $monthNum = $months[$efemeride->month] ?? 99;
            return sprintf('%02d-%02d', $monthNum, (int)$efemeride->day);
        })->values();
    }
}
