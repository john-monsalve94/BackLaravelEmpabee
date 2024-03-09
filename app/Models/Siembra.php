<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Siembra extends Model
{
    use HasFactory;
    protected $table ="produccions";
    protected $guarded = [];

    public function colmena():BelongsTo
    {
        return $this->belongsTo(Colmena::class,'colmena_id');
    }

    public function producciones():HasMany
    {
        return $this->hasMany(Produccion::class,'siembra_id');
    }
}
