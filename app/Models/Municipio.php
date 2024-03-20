<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Municipio extends Model
{
    use HasFactory;
    protected $table = "municipios";
    protected $guarded = [];

    public function departamento():BelongsTo
    {
        return $this->belongsTo(Departamento::class,'departamento_id');
    }

    public function users_born():HasMany
    {
        return $this->hasMany(User::class,'municipio_nacimiento_id');
    }

    public function users_living():HasMany
    {
        return $this->hasMany(User::class,'municipio_residencia_id');
    }
}
