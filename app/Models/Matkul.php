<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Matkul extends Model
{
    use HasFactory;

    protected $table = 'matkul';

    protected $guarded = ['id'];

    public function jadwal() : HasMany 
    {
        return $this->hasMany(Jadwal::class);
    }
    
    public function user() : BelongsTo 
    {
        return $this->belongsTo(User::class);
    }
}
