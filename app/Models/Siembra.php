<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Siembra extends Model
{
    use HasFactory;
    protected $table ="produccions";
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($simbra) {
           $siembra_anterior = Siembra::where('colmena_id',$simbra->colmena_id)->latest()->first();
           $siembra_anterior -> fecha_fin = Carbon::now();
           $siembra_anterior->save();
        });

    }


    public function colmena():BelongsTo
    {
        return $this->belongsTo(Colmena::class,'colmena_id');
    }

    public function producciones():HasMany
    {
        return $this->hasMany(Produccion::class,'siembra_id');
    }
}
