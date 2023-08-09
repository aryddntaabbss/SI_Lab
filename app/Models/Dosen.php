<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'dosen';

    protected $guarded = ['id'];

    public function jadwal() : HasMany 
    {
        return $this->hasMany(Jadwal::class);
    }

    public function prodi() : BelongsTo
    {
        return $this->belongsTo(Prodi::class);
    }
}
