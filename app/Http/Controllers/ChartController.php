<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ChartController extends Controller
{
    public function getData()
    {

        $path = public_path('json/hsi2023.json');
        $data = File::get($path);
        return response($data, 200)->header('Content-Type', 'application/json');
    }
}