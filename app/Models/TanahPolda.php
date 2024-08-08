<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TanahPolda extends Model
{
    use HasFactory;

    public $table = 'tanah_polda';

    public $fillable = [
        'nama',
    ];
}
