<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TipoIdentificacion extends Model
{
    use HasFactory;
    protected $table ="tipo_identificacions";
    protected $guarded = [];

    public function users():HasMany
    {
        return $this->hasMany(User::class,'tipo_identificacion_id');
    }
}
