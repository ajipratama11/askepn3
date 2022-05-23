<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perawat extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'nama_perawat',
        'jenis_kelamin',
        'alamat',
        'password'
    ];

    public function pasien()
    {
        return $this->hasOne(Pengkajian::class);
    }
}
