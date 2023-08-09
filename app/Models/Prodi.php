<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Prodi extends Model
{
    use HasFactory;

    protected $table = 'kelas';

    protected $guarded = ['id'];

    public function jadwal() : HasMany 
    {
        return $this->hasMany(Jadwal::class);
    }

    public function dosen() : HasMany
    {
        return $this->hasMany(Dosen::class);
    }
}
