<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::all();
        $auth = Auth::user();
        $pasien = Pasien::all()->count();
        $perawat = User::where('role','perawat')->count();
        return view('pages.dashboard',[
            'user'=>$user,
            'auth'=>$auth,
            'pasien'=> $pasien,
            'perawat'=>$perawat
        ]);
    }
}
