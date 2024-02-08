<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Libro extends Model
{
    use HasFactory;

    protected $table = 'libros';
    protected $fillable = [
        'id',
        'titulo',
        'autor_id',
        'lote',
        'description'
    ];

    public function autor(): BelongsTo
    {
        return $this->belongsTo(Autor::class);
    }

    public function prestamo(): HasOne {
        return $this->hasOne(Prestamos::class);
    }
}
