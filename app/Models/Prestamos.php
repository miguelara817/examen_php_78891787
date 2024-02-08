<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Prestamos extends Model
{
    use HasFactory;

    protected $table = 'prestamos';
    protected $fillable = [
        'libro_id',
        'cliente_id',
        'fecha_prestamo',
        'dias_prestamo',
        'estado'
    ];

    public function libro(): BelongsTo
    {
        return $this->belongsTo(Libro::class);
    }

    public function cliente(): BelongsTo
    {
        return $this->belongsTo(Cliente::class);
    }
}
