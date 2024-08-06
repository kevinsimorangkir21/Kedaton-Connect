<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hsi2023 extends Model
{
    use HasFactory;

    protected $table = 'hsi2023';


    protected $fillable = [
        'BULAN', 'TGL BAGI WO', 'STO', 'STATUS', 
        'KETERANGAN', 'MITRA', 'SEGMEN'
    ];

}
