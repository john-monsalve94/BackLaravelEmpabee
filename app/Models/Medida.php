<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Medida extends Model
{
    use HasFactory;
    protected $table ="medidas";
    protected $guarded = [];

    public function reporte():BelongsTo
    {
        return $this->belongsTo(Reporte::class);
    }

    public function sensor():BelongsTo
    {
        return $this->belongsTo(Sensor::class);
    }
}
