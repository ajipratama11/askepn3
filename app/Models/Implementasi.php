<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Implementasi extends Model
{
    use HasFactory;

    protected $fillable = [

        'pengkajian_id',
        'nic',
        'tanggal',
        'keterangan'

    ];

    public function identi($id)
    {
        return RencanaNic::where('id', $id)->value('identifikasi_nic');
    }

    public function id($id)
    {
        return RencanaNic::where('id', $id)->value('id');
    }
}
