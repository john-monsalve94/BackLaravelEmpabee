<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "users";
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'ruta_foto'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected $appends = [
        'url_foto'
    ];

    public function getUrlFotoAttribute()
    {
        if (isset($this->attributes['ruta_foto'])) {
            return url($this->attributes['ruta_foto']);
        }

        return null;
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function municipio_nacimiento(): BelongsTo
    {
        return $this->belongsTo(Municipios::class, 'municipio_nacimiento_id');
    }

    public function municipio_residencia(): BelongsTo
    {
        return $this->belongsTo(Municipios::class, 'municipio_residencia_id');
    }

    public function tipo_identificacion(): BelongsTo
    {
        return $this->belongsTo(TipoIdentificacion::class,'tipo_identificacion_id');
    }

    public function colmenas(): HasMany
    {
        return $this->hasMany(Colmena::class,'user_id');
    }

    public function notificaciones():HasMany
    {
        return $this->hasMany(Notificacion::class,'user_id');
    }
}
