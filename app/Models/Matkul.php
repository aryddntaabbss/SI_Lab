<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Matkul extends Model
{
    use HasFactory;

    protected $table = 'matkul';

    protected $guarded = ['id'];

    public function jadwal() : HasOne 
    {
        return $this->hasOne(Jadwal::class);
    }
    
    public function user() : BelongsTo 
    {
        return $this->belongsTo(User::class, 'id_dosen');
    }
}
