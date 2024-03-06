<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Reporte extends Model
{
    use HasFactory;
    protected $table ="reportes";
    protected $guarded = [];

    public function controlador():BelongsTo
    {
        return $this->belongsTo(Controlador::class);
    }

    public function medidas():HasMany
    {
        return $this->hasMany(Medida::class);
    }
}
