<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Controlador extends Model
{
    use HasFactory,SoftDeletes;
    protected $table ="controladors";
    protected $guarded = [];

    public function colmena():BelongsTo
    {
        return $this->belongsTo(Colmena::class);
    }

    public function reportes():HasMany
    {
        return $this->hasMany(Reporte::class);
    }
}
