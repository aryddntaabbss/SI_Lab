<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Populasi extends Model
{
    use HasFactory;

    protected $table = 'populasi';

    protected $fillable = ['id', 'fitness'];

    public function hari(): HasMany
    {
        return $this->hasMany(Jadwal::class,'id_jadwal');
    } 
}
