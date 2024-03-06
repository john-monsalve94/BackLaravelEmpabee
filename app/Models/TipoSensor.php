<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoSensor extends Model
{
    use HasFactory;
    protected $table ="tipo_sensors";
    protected $guarded = [];

    public function sensores():HasMany
    {
        return $this->hasMany(Sensor::class);
    }
}
