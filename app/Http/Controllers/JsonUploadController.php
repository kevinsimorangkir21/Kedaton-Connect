<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\View;

class JsonUploadController extends Controller
{
    public function upload(Request $request)
    {
        // Validasi file JSON
        $request->validate([
            'jsonFile' => 'required|mimes:json|max:2048',
        ]);

        // Cek nama file
        $file = $request->file('jsonFile');
        if ($file->getClientOriginalName() !== 'hsi2024.json') {
            return response()->json(['message' => 'Hanya file dengan nama "hsi2024.json" yang diizinkan.'], 400);
        }

        // Simpan file JSON yang di-upload ke folder public/json
        $fileName = 'hsi2024.json'; // Nama file yang akan di-overwrite
        $filePath = public_path('json/' . $fileName);

        // Overwrite file JSON yang ada
        if ($file->move(public_path('json'), $fileName)) {
            return response()->json(['message' => 'Dashboard ALL Berhasil Di-Update!'], 200);
        }

        return response()->json(['message' => 'Upload gagal.'], 400);
    }

    public function uploadDashboard(Request $request)
    {
        // Validasi file JSON
        $request->validate([
            'dashboardFile' => 'required|mimes:json|max:2048',
        ]);

        // Cek nama file
        $file = $request->file('dashboardFile');
        if ($file->getClientOriginalName() !== 'dashboard.json') {
            return response()->json(['message' => 'Hanya file dengan nama "dashboard.json" yang diizinkan.'], 400);
        }

        // Simpan file JSON yang di-upload ke folder public/json
        $fileName = 'dashboard.json'; // Nama file yang akan di-overwrite
        $filePath = public_path('json/' . $fileName);

        // Overwrite file JSON yang ada
        if ($file->move(public_path('json'), $fileName)) {
            return response()->json(['message' => 'Data 2024 Berhasil Di-Update!'], 200);
        }

        return response()->json(['message' => 'Upload gagal.'], 400);
    }
}