<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasienNoc extends Model
{
    use HasFactory;

    protected $fillable = [
        'hari',
        'pengkajian_id',
        'diagnosa_id',
        'noc'
    ];

    public function identi($id)
    {
        return TujuanNoc::where('id', $id)->value('identifikasi_noc');
    }
}
