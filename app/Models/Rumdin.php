<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rumdin extends Model
{
    use HasFactory;

    public $table = 'rumdin';

    public $fillable = [
        'nama',
        'parent_id',
        'rumah_tapak_jumlah',
        'rumah_tapak_kapasitas',
        'mess_jumlah',
        'mess_kapasitas',
        'rusun_jumlah',
        'rusun_kapasitas',
        'rusus_jumlah',
        'rusus_kapasitas',
        'barak_jumlah',
        'barak_kapasitas',
        'user_id',
    ];

    public $appends = [
        'total_jumlah',
        'total_kapasitas',
    ];

    function totalJumlah(): Attribute
    {
        return new Attribute(
            get: function () {
                return $this->rumah_tapak_jumlah + $this->mess_jumlah + $this->rusun_jumlah + $this->rusus_jumlah + $this->barak_jumlah;
            }
        );
    }

    function totalKapasitas(): Attribute
    {
        return new Attribute(
            get: function () {
                return $this->rumah_tapak_kapasitas + $this->mess_kapasitas + $this->rusun_kapasitas + $this->rusus_kapasitas + $this->barak_kapasitas;
            }
        );
    }
}
