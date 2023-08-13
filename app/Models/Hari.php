<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hari extends Model
{
    use HasFactory;
    
    protected $table = 'hari';

    protected $guarded = ['id'];

    public function hari(): HasMany
    {
        return $this->hasMany(Hari::class,'id_hari');
    }    
}
