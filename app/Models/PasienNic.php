<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasienNic extends Model
{
    use HasFactory;

    protected $fillable = [

        'pengkajian_id',
        'diagnosa_id',
        'nic'
    ];

    public function identi($id)
    {
        return RencanaNic::where('id', $id)->value('identifikasi_nic');
    }

    public function id($id)
    {
        return RencanaNic::where('id', $id)->value('id');
    }

    public function pengkajian($id)
    {
        return PasienNic::where('pengkajian_id',$id)->value('id');
    }
}
