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
    protected $appends = ['promedio_temperatura', 'promedio_peso', 'promedio_humedad'];

    public function getPromedioTemperaturaAttribute()
    {
        return $this->calcularPromedio(3);
    }

    public function getPromedioPesoAttribute()
    {
        return $this->calcularPromedio(2);
    }

    public function getPromedioHumedadAttribute()
    {
        return $this->calcularPromedio(1);
    }

    public function controlador():BelongsTo
    {
        return $this->belongsTo(Controlador::class);
    }

    public function medidas():HasMany
    {
        return $this->hasMany(Medida::class,'reporte_id');
    }

    protected function calcularPromedio($tipoMedida)
    {
        return Medida::whereHas('sensor', function ($query) use ($tipoMedida) {
                $query->where('tipo_sensor_id', $tipoMedida);
            })
            ->whereHas('reporte', function ($query) {
                $query->where('controlador_id', $this->controlador_id);
            })
            ->avg('valor');
    }
}
