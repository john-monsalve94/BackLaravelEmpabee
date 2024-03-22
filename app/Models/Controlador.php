<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;

class Controlador extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "controladors";
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($controlador) {
            $controlador->uuid = Uuid::uuid4();
        });

    }

    public function colmena(): BelongsTo
    {
        return $this->belongsTo(Colmena::class,'colmena_id');
    }

    public function reportes(): HasMany
    {
        return $this->hasMany(Reporte::class,'controlador_id','uuid');
    }

    public function sensores():HasMany
    {
        return $this->hasMany(Sensor::class,'controlador_id','uuid');
    }
}
