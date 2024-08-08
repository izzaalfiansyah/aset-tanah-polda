<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RumdinGolongan extends Model
{
    use HasFactory;

    public $table = 'rumdin_golongan';

    public $fillable = [
        'nama',
        'parent_id',
        'jumlah_personel',
        'rumah_dinas_jumlah',
        'rumah_dinas_kapasitas',
        'rumah_dinas_polri_aktif',
        'rumah_dinas_polri_punra',
        'rumah_dinas_non_polri',
        'rumah_non_dinas_pribadi',
        'rumah_non_dinas_orang_tua',
        'rumah_non_dinas_sewa',
        'keterangan',
    ];
}
