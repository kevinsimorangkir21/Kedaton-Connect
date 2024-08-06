<?php

namespace App\Http\Controllers;

use App\Models\hsi2023;
use Illuminate\Http\Request;

class hsi2023Controller extends Controller
{
    public function index()
    {
        $hsi2023s = Hsi2023::select('BULAN', 'TGL BAGI WO', 'STO', 'STATUS', 'KETERANGAN', 'MITRA', 'SEGMEN')->get();
        return view('dashboard', compact('hsi2023s'));
    }
}
