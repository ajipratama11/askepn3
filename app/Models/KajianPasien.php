<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KajianPasien extends Model
{
    use HasFactory;


    protected $fillable = [
        'pasien_id',
        'perawat_id',
        'tgl_pengkajian',
        'keluhan',
    ];
}
