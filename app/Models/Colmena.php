<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Colmena extends Model
{
    use HasFactory,SoftDeletes;
    protected $table ="colmenas";
    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function controladores():HasMany
    {
        return $this->hasMany(Controlador::class);
    }

    public function siembras():HasMany
    {
        return $this->hasMany(Siembra::class);
    }
}
