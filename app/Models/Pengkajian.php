<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengkajian extends Model
{
    use HasFactory;

    protected $fillable = [
        'kajian_id',
        'pasien_id',
        'perawat_id',
        'ruang',
        'tanggal',
        'keluhan',
        'nadi',
        'suhu',
        'tensi_darah',
        'riwayat_penyakit_sekarang',
        'riwayat_penyakit_terdahulu',
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }
}
