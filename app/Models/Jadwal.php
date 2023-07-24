
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{

    protected $table = 'jadwals';

    public $timestamps = false;

    // Fillable fields to allow mass assignment
    protected $fillable = [
        'field1',
        'field2',

    ];

}
