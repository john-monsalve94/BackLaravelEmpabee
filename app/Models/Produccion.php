<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Produccion extends Model
{
    use HasFactory;
    protected $table ="produccions";
    protected $guarded = [];

    public function siembra():BelongsTo
    {
        return $this->belongsTo(Siembra::class,'siembra_id');
    }
}
