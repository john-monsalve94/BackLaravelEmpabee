<?php

namespace App\Models;

use App\Enums\ReportStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Colmena extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "colmenas";
    protected $guarded = [];
    protected $append = [
        'estado'
    ];

    public function getEstadoAttribute(): string
    {
        $last_report = $this
            ->controladores()
            ->whereHas('reportes', function ($query) {
                $query
                    ->where('titulo_reporte', ReportStatus::ALERTA)
                    ->where('leido', false);
            })->exists();
        if ($last_report) {
            return ReportStatus::ALERTA;
        }
        $last_report = $this
        ->controladores()
        ->whereHas('reportes', function ($query) {
            $query
                ->where('titulo_reporte', ReportStatus::ADVERTENCIA)
                ->where('leido', false);
        })->exists();
        if ($last_report) {
            return ReportStatus::ADVERTENCIA;
        }
        $last_report = $this
        ->controladores()
        ->whereHas('reportes', function ($query) {
            $query
                ->where('titulo_reporte', ReportStatus::INFO)
                ->where('leido', false);
        })->exists();
        if ($last_report) {
            return ReportStatus::INFO;
        }
        return 'NORMAL';
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($colmena) {
            $colmena->users_id = Auth::id();
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function controladores(): HasMany
    {
        return $this->hasMany(Controlador::class);
    }

    public function siembras(): HasMany
    {
        return $this->hasMany(Siembra::class);
    }
}
