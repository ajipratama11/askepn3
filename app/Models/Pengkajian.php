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


    public function perawat()
    {
        return $this->belongsTo(User::class);
    }

    public function nics()
    {
        return $this->hasOne(PasienNic::class);
    }

    public function nocs()
    {
        return $this->hasOne(PasienNoc::class);
    }
    public function evaluasi()
    {
        return $this->hasOne(Evaluasi::class);
    }
    public function implementasi()
    {
        return $this->hasOne(Implementasi::class);
    }

    public function nic($id)
    {

        $nic =  PasienNic::where('pengkajian_id', $id)->value('diagnosa_id');

        return Diagnosa::where('id', $nic)->value('nama_diagnosa');
    }

    
}
