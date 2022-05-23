<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RencanaNic extends Model
{
    use HasFactory;

    protected $fillable = [
        'identifikasi_nic',
        'target_selesai'
    ];
}
