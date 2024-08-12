<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembangunanRumdin extends Model
{
    use HasFactory;

    public $table = 'pembangunan_rumdin';

    public $fillable = [
        'nama',
        'parent_id',
        'nama',
        'jenis_bangunan',
        'tipe',
        'jumlah',
        'sumber_gar',
        'keterangan',
        'user_id',
    ];

    public $with = ['user'];

    public $appends = [
        'luas',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function luas(): Attribute
    {
        return new Attribute(
            get: function () {
                return $this->tipe * $this->jumlah;
            }
        );
    }
}
