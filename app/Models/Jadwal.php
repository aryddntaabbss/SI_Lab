<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Jadwal extends Model
{
    use HasFactory;

    public function kelas(): BelongsTo
    {
        return $this->belongsTo(Kelas::class,'id_kelas');
    }

    public function Prodi(): BelongsTo
    {
        return $this->belongsTo(Kelas::class,'id_prodi');
    }

    public function Dosen(): BelongsTo
    {
        return $this->belongsTo(Kelas::class,'nip');
    }

    public function Matkul(): BelongsTo
    {
        return $this->belongsTo(Kelas::class,'id_matkul');
    }
}
