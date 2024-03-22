<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notificacion extends Model
{
    use HasFactory;
    protected $table ="notificacions";
    protected $guarded = [];
    protected $casts = [
        'comand' => 'json',
        'leido'=>'boolean'
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
