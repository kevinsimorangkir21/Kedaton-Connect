<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\View;

class CsvUploadController extends Controller
{
    public function upload(Request $request)
    {
        // Validasi file CSV
        $request->validate([
            'csvFile' => 'required|mimes:csv,txt|max:2048',
        ]);

        // Ambil file yang di-upload
        $file = $request->file('csvFile');
        $fileName = $file->getClientOriginalName();

        // Validasi nama file
        if ($fileName !== 'hsi2024.csv') {
            return redirect()->back()->with('error', 'Hanya file dengan nama "hsi2024.csv" yang diizinkan.');
        }

        // Tentukan path penyimpanan
        $destinationPath = public_path('csv');

        // Simpan file langsung ke folder public/csv
        try {
            $file->move($destinationPath, $fileName);
            return redirect()->back()->with('success', 'Dashboard ALL Berhasil Di-Update!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Upload gagal. Error: ' . $e->getMessage());
        }
    }

    public function uploadDashboard(Request $request)
    {
        // Validasi file CSV
        $request->validate([
            'dashboardFile' => 'required|mimes:csv,txt|max:2048',
        ]);

        // Ambil file yang di-upload
        $file = $request->file('dashboardFile');
        $fileName = $file->getClientOriginalName();

        // Validasi nama file
        if ($fileName !== 'dashboard.csv') {
            return redirect()->back()->with('error', 'Hanya file dengan nama "dashboard.csv" yang diizinkan.');
        }

        // Tentukan path penyimpanan
        $destinationPath = public_path('csv');

        // Simpan file langsung ke folder public/csv
        try {
            $file->move($destinationPath, $fileName);
            return redirect()->back()->with('success', 'Data 2024 Berhasil Di-Update!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Upload gagal. Error: ' . $e->getMessage());
        }
    }
}