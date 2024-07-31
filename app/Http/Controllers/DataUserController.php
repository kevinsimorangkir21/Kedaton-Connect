<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\View;

class DataUserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $data = User::all();
        return view('profile', compact('data'));
    }


    public function tambahuser()
    {
        return view('/tambahuser');
    }
    public function insertuser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users', // Validasi email yang benar dan unik
            'password' => 'required|string|min:8',
        ]);
        User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password' => bcrypt($request->password), // Hash password sebelum menyimpan
    ]);
        return redirect()->route('profile')->with('success', 'User berhasil ditambahkan.');
    }

    public function deleteuser($id) {
        $data = User::find($id);
        if ($data) {
            $data->delete();
            return redirect()->route('profile')->with('success', 'User berhasil dihapus');
        }
        return redirect()->route('profile')->with('error', 'User tidak ditemukan');
    }
    
}