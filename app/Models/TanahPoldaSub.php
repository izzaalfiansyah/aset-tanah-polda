<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TanahPoldaSub extends Model
{
    use HasFactory;

    public $table = 'tanah_polda_sub';

    public $fillable = [
        'tanah_polda_id',
        'nama',
        'jumlah_luas',
        'jumlah_persil',
        'hibah_luas',
        'hibah_persil',
        'swadaya_luas',
        'swadaya_persil',
        'sengketa_luas',
        'sengketa_persil',
        'pinjam_pakai_luas',
        'pinjam_pakai_persil',
        'keterangan',
    ];

    public $appends = [
        'belum_sertifikat_jumlah_luas',
        'belum_sertifikat_jumlah_persil',
        'total_luas',
        'total_persil',
    ];

    public function belumSertifikatJumlahLuas(): Attribute
    {
        return new Attribute(
            get: function () {
                return $this->hibah_luas + $this->swadaya_luas + $this->sengketa_luas;
            }
        );
    }

    public function belumSertifikatJumlahPersil(): Attribute
    {
        return new Attribute(
            get: function () {
                return $this->hibah_persil + $this->swadaya_persil + $this->sengketa_persil;
            }
        );
    }

    public function totalLuas(): Attribute
    {
        return new Attribute(
            get: function () {
                return $this->belum_sertifikat_jumlah_luas + $this->jumlah_luas + $this->pinjam_pakai_luas;
            }
        );
    }

    public function totalPersil(): Attribute
    {
        return new Attribute(
            get: function () {
                return $this->belum_sertifikat_jumlah_persil + $this->jumlah_persil + $this->pinjam_pakai_persil;
            }
        );
    }
}
