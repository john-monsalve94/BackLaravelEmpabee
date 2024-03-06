<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sensor extends Model
{
    use HasFactory;
    protected $table ="sensors";
    protected $guarded = [];

    public function controlador():BelongsTo
    {
        return $this->belongsTo(Controlador::class);
    }

    public function tipo_sensor():BelongsTo
    {
        return $this->belongsTo(TipoSensor::class);
    }

    public function medidas():HasMany
    {
        return $this->hasMany(Medida::class);
    }
}
