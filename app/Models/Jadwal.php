<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';

    protected $guarded = ['id'];

    public function matkul(): BelongsTo
    {
        return $this->belongsTo(Matkul::class,'id_matkul');
    }
    
    public function hari(): BelongsTo
    {
        return $this->belongsTo(Hari::class,'id_hari');
    }

    public function populasi(): BelongsTo{
        return $this->belongsTo(Populasi::class, 'id_populasi');
    }
}
