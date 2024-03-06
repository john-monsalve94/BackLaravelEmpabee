<?php

namespace App\Models;

use App\Enums\ReportStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Controlador extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "controladors";
    protected $guarded = [];
    protected $appends = [
        'senal'
    ];

    public function getSenalAttribute(): string
    {
        $last_report = $this
            ->reportes()
            ->where('titulo_reporte', ReportStatus::ALERTA)
            ->where('leido', false)->exists();
        if ($last_report) {
            return ReportStatus::ALERTA;
        }
        $last_report = $this
            ->reportes()
            ->where('titulo_reporte', ReportStatus::ADVERTENCIA)
            ->where('leido', false)->exists();
        if ($last_report) {
            return ReportStatus::ADVERTENCIA;
        }
        $last_report = $this
            ->reportes()
            ->where('titulo_reporte', ReportStatus::INFO)
            ->where('leido', false)->exists();
        if ($last_report) {
            return ReportStatus::INFO;
        }
        return 'NORMAL';
    }

    public function colmena(): BelongsTo
    {
        return $this->belongsTo(Colmena::class);
    }

    public function reportes(): HasMany
    {
        return $this->hasMany(Reporte::class);
    }
}
