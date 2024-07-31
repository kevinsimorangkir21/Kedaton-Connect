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


    public function insertuser(Request $request)
    {
        User::create(['name'=>$request->name,
        'email'=>$request->email,
        'password'=>$request->password
    ]);
        return redirect()->route('profile');
    }

    public function deleteuser($id) {
        $data = User::find($id);
        $data->delete();
        return redirect()->route('profile')->with('success', 'berhasil dihapus');
    }
}
